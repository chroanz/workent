<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'phone'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
