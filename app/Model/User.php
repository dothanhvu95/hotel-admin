<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $casts = [
        'created_at' => 'date:Y-m-d',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
