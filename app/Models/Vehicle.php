<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Vehicle extends Model
{
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    protected $fillable = [
        'marca',
        'modello',
        'targa',
        'posti',
        'prezzo_giornaliero',
    ];

}
