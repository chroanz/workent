<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rent extends Model
{
    protected $fillable = [
        'rentStart',
        'rentEnd',
        'client_id',
        'room_id'
    ];

    protected $casts = [
        'rentStart' => 'datetime',
        'rentEnd' => 'datetime'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    // public function guests(): HasMany
    // {
    //     return $this->hasMany(Guest::class);
    // }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function evaluation(): HasOne
    {
        return $this->hasOne(Evaluation::class);
    }
}
