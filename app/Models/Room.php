<?php

namespace App\Models;

use DateTime;
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
        'description',
    ];

    public function rents(): HasMany
    {
        return $this->hasMany(Rent::class);
    }

    public function getAverageStars(): float
    {
        $roomStars = $this->rents->avg('evaluation.stars');
        return $roomStars ?? 0;
    }

    public function getWhenRoomIsFree(): DateTime
    {
        $roomRents = $this->rents->where('rentEnd', '>=', now())->sortBy('rentEnd');
        if ($roomRents->isEmpty()) {
            return new DateTime();
        }
        $rentEnd = $roomRents->last()->rentEnd;

        return $rentEnd < now() ? new DateTime() : $rentEnd;
    }
}
