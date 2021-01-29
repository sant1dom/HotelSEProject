<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from',
        'to',
        'user_id',
        'check-in',
        'check-out',
        'booking_code'
    ];

    public function services(){
        return $this->belongsToMany(Service::class);
    }

    public function rooms(){
        return $this->belongsToMany(Room::class);
    }

    public function guests(){
        return $this->belongsToMany(Guest::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
