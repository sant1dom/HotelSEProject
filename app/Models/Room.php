<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'type',
        'numroom',
        'price',
        'capacity'
    ];

    public function bookings(){
        return $this->belongsToMany(Booking::class);
    }
}
