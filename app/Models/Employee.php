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

    public static function addEmployeeByEmail(array $attributes)
    {
        $attributes = (object) $attributes;
        
        $user = \App\Models\User::where('email', $attributes->email)->first();
        if (!$user) {
            return null;
        }
        return self::create([
            'user_id' => $user->id,
            'name' => $attributes->name,
            'phone' => $attributes->phone
        ]);
    }
}
