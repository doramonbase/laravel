<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = [
        'avatar',
        'name',
        'phone',
        'gender',
        'email'
    ];
}
