// app/Models/Guest.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'rent_id',
        'name',
        'email',
    ];

    public function rent()
    {
        return $this->belongsTo(Rent::class);
    }
}
