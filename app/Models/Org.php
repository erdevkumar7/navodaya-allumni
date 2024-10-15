<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Org extends Authenticatable
{
    protected $fillable = [
        'name', 'phone_number', 'email', 'password', 'original_password',
    ];

    // Hide the password when the model is converted to an array or JSON
    protected $hidden = [
        'password',
    ];
}

