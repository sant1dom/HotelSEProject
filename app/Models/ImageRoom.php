<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;

/**
 * @method static latest()
 * @method static create(array $array)
 * @method static where(string $string, int $int)
 */
class ImageRoom extends Model
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

    public function destroyImg($image)
    {
        /*onclick="{{ $image->destroyImg($image) }}"*/
        $image = DB::table('images')->where('id', $image->id)->first();
        $file= $image->path;
        $filename = public_path().'/uploads/'.$file;
        @unlink($filename);
    }

}
