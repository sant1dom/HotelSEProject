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
class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'contact_string',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
