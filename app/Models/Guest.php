<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'entrance_code',
        'rent_id'
    ];

    function rent(): BelongsTo
    {
        return $this->belongsTo(Rent::class);
    }
}
