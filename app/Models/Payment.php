<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'price',
        'payment_method',
        'rent_id'
    ];

    public function rent(): BelongsTo
    {
        return $this->belongsTo(Rent::class);
    }
}
