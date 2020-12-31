<?php

namespace App\Http\Controllers;

use App\Models\Image;

class ImageController extends Controller
{

/*    public function create(array $data)
    {
        return Image::create([
            'room_id' => $data['room_id'],
            'path' => $data['path']
        ]);
    }*/

    //inserisce l'oggetto nel DB
    public function store()
    {
        $this->validateImage();
        $image = new Image(request(['room_id', 'path']));
        $image->save();
    }

    function validateImage()
    {
        return request()->validate([
            'room_id' => 'required',
            'path' => 'required'
        ]);
    }
}
