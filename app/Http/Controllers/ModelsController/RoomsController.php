<?php

namespace App\Http\Controllers\ModelsController;

use App\Models\Image;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class RoomsController extends Controller
{
    public function index()
    {
        $rooms = room::latest()->get();

        return view('rooms.index', ['rooms' => $rooms]);

    }

    public function userIndex(Request $request)
    {
        $types = room::get();
        $types->unique('type');
        if (!($request->typeSelection === 'None')) {
            $type = $request->typeSelection;
            $rooms = Room::where('type', 'LIKE', $type)->get()->sortBy('id');
        } else {
            $rooms = Room::get();
        }
        return view('rooms.userIndex', ['rooms' => $rooms, 'types' => $types]);

    }


    //Mostra un SINGOLO SPECIFICO oggetto
    public function show(Room $room) //Room $room
    {
        return view('rooms.show', ['room' => $room]);
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
                $file->move(public_path('storage'), $name);

                $image = new Image();
                $image->path = $name;
                $image->room_id = $room->id;
                $image->save();
            }
        }


        return redirect()->route('rooms.index')
            ->with('success', 'Service created successfully.');
    }

    //Mostra una vista per modificare un oggetto esistente
    public function edit(Room $room)
    {
        return view('rooms.edit', ['room' => $room]);
    }

    public function disableIndex()
    {
        $rooms = room::latest()->get();
        return view('rooms.disableIndex', ['rooms' => $rooms]);
    }

    public function disable(Request $request)
    {
        $room = room::where('numroom', $request->numroom);
        $room->availability = $request->availabiltiy;
        $room->update();

        $rooms = room::latest()->get();
        return redirect()->route('rooms.disableIndex', ['rooms' => $rooms]);
    }

    //aggiorana nel database l'oggetto con la modifica
    public function update(Room $room, Request $request)
    {
        $this->validateRoom();
        $room->availability = strcmp(\request('availability'), 'On');
        $room->update($request->all(['type', 'numroom', 'price', 'capacity', 'description']));

        return redirect()->route('rooms.show', ['room' => $room]);
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
