<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'enteredAt',
        'exitAt'
    ];

    public function services(){
        return $this->belongsTo(Service::class);
    }

    public function guests(){
        return $this->belongsTo(Guest::class);
    }

}
