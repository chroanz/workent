<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'price',
        'payment_method',
        'room_id'
    ];
    
}
