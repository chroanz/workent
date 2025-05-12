<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
        'price',
    ];

    public function rents(): HasMany
    {
        return $this->hasMany(Rent::class);
    }

    public function getAverageStars(): float
    {
        $room_stars = $this->rents->avg('evaluation.stars');
        return $room_stars ?? 0;
    }
}
