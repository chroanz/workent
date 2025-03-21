// app/Models/Room.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
        'price',
    ];

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }
}
