<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;

    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bank()
    {
        return $this->belongsTo('App\Models\Bank');
    }

        public function transactions()
    {
        return $this->hasMany('App\Models\Account');
    }

    public function bets()
    {
        return $this->hasMany('App\Models\Bet');
    }

    public function user_bets()
    {
        return $this->belongsToMany('App\Models\Bet')
            ->withPivot('my_option');

    }
}
