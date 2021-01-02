<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'surname',
        'birthdate',
        'doctype',
        'numdoc',

    ];
    /**
     * @var mixed
     */


    /**
     * @var mixed
     */


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bookings(){
        return $this->belongsToMany(Booking::class);
    }
}
