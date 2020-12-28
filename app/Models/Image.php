<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 * @method static create(array $array)
 * @method static where(string $string, int $int)
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'path'
    ];

    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }
}
