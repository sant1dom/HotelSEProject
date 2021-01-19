<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @method static latest()
 * @method static take(int $int)
 * @method static get()
 */
class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'numroom',
        'price',
        'capacity',
        'availability',
        'description',
        'hotel_id'
    ];

    public function path()
    {
        return route('rooms.show', $this);
    }

    public function bookings(){
        return $this->belongsToMany(Booking::class);
    }

    public function imageRooms(){
        return $this->hasMany(ImageRoom::class);
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
