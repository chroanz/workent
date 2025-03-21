// app/Models/Payment.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'rent_id',
        'moment',
        'value',
    ];

    protected $dates = [
        'moment',
    ];

    public function rent()
    {
        return $this->belongsTo(Rent::class);
    }
}
