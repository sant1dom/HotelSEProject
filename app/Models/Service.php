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
class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'availability',
    ];

    public function bookings(){
        return $this->belongsToMany(Booking::class);
    }
}
