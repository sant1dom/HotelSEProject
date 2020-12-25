<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hotelname',
        'address',
        'capacity',
        'stars'
    ];

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    public function admins(){
        return $this->hasMany(Admin::class);
    }
}
