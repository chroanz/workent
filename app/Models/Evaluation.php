// app/Models/Evaluation.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'rent_id',
        'comment',
        'stars',
    ];

    public function rent()
    {
        return $this->belongsTo(Rent::class);
    }
}
