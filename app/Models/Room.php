<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method path()
 * @method static latest()
 * @method static find(int $int)
 * @method static findOrFail(int $int)
 * @method static create(array $array)
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

    public function bookings(){
        return $this->belongsToMany(Booking::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
