<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
        protected $fillable = [
        'name', 'image_path'
    ];

        public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
