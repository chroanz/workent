<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'stars',
    ];

    public function rent(): BelongsTo
    {
        return $this->belongsTo(Rent::class);
    }
}
