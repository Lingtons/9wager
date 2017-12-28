<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Bet extends Model
{
    //
    use Sluggable;

    protected $fillable = [
        'name', 'code', 'type', 'deadline','amount','win_option','status'
    ];

    protected $dates = ['deadline'];

        public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

        public function bet_users()
    {
        return $this->belongsToMany('App\Models\User')
                    ->withPivot('my_option');
    }


}
