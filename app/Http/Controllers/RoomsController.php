<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RoomsController extends Controller
{
    public function index()
    {
        $rooms = room::latest()->get();

        return view('rooms.index', ['rooms' => $rooms]);

    }

    public function userIndex()
    {
        $rooms = room::latest()->get();

        return view('rooms.userIndex', ['rooms' => $rooms]);

    }


    //Mostra un SINGOLO SPECIFICO oggetto
    public function show(Room $room) //Room $room
    {
        return view('rooms.show', ['room' => $room]);

    }

    public function userShow(Room $room) //Room $room
    {
        return view('rooms.userShow', ['room' => $room]);
    }

    //Mostra una vista per creare un nuovo oggetto
    public function create()
    {
        return view('rooms.create');
    }

    //inserisce l'oggetto nel DB
    public function store(Request $request)
    {
        $this->validateRoom();

        $room = new Room(request(['type', 'numroom', 'price', 'capacity', 'description']));
        $room->availability = strcmp(\request('availability'), 'On');
        $room->hotel_id = 1;
        $room->save();


        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('uploads'), $name);

                $image = new Image();
                $image->path = $name;
                $image->room_id = $room->id;
                $image->save();
            }
        }


        return redirect($room->path());
    }

    //Mostra una vista per modificare un oggetto esistente
    public function edit(Room $room)
    {
        return view('rooms.edit', ['room' => $room]);
    }

    //aggiorana nel database l'oggetto con la modifica
    public function update(Room $room, Request $request)
    {
        $this->validateRoom();
        $room->availability = strcmp(\request('availability'), 'On');
        $room->update($request->all(['type', 'numroom', 'price', 'capacity', 'description']));



        return redirect()->route('rooms.show',['room' => $room]);
    }

    //elimina l'oggetto dal database
    public function destroy(Room $room)
    {
        Storage::delete($room->images());
    }

    protected function validateRoom()
    {
        return request()->validate([
            'type' => 'required',
            'numroom' => 'required',
            'price' => 'required',
            'capacity' => 'required',
            'availability',
            'description' => 'required',
            'images' => 'required',
            'images.*' => 'image'
        ]);
    }
}
