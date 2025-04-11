<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthday',
        'address'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
