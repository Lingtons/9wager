<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $fillable = [
        'amount', 'type', 'description', 'bank_reference','user_id','bet_id','bank_id'
    ];

    protected $date = ['created_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
