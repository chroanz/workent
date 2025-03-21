// app/Models/Rent.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'room_id',
        'rent_start',
        'rent_end',
    ];

    protected $dates = [
        'rent_start',
        'rent_end',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
