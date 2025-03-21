// app/Models/Client.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'birthday',
        'address',
    ];

    protected $dates = [
        'birthday',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }
}
