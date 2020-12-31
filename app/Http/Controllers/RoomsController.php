<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

use Symfony\Component\Console\Input\Input;

class RoomsController extends Controller
{

    /*if (auth()->user() && request()->is('guestCheckout')) {
    return redirect()->route('checkout.index');
    }*/

    public function index()
    {
        $rooms = room::latest()->get();

        return view('rooms.index', ['rooms' => $rooms]);
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
        $room->availability = strcmp ( \request('availability') , 'On');
        $room->hotel_id=1;
        $room->save();

        return redirect($room->path());
    }

    //Mostra una vista per modificare un oggetto esistente
    public function edit(Room $room)
    {
        //compact è un modo veloce per scrivere ['room' => $room]
        return view('rooms.edit', compact('room'));
    }

    //aggiorana nel database l'oggetto con la modifica
    public function update(Room $room)
    {
        $room->update();

        return redirect($room->path());
    }

    //elimina l'oggetto dal database
    public function destroy(Room $room)
    {

    }

    protected function validateRoom()
    {
        return request()->validate([
            'type' => 'required',
            'numroom' => 'required',
            'price' => 'required',
            'capacity' => 'required',
            'availability',
            'description'=> 'required',
        ]);
    }

    protected function validateImage()
    {
        return request()->validate([
            'path',
        ]);
    }

}
