<?php

namespace App\Http\Controllers;


use App\Models\Room;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = room::latest()->get();

        return view('home', ['room' => $rooms]);
    }

    //Mostra un SINGOLO SPECIFICO oggetto
    public function show(Room $room)
    {
        return view('rooms.show', ['room' => $room]);
    }

    //Mostra una vista per creare un nuovo oggetto
    public function create()
    {
        return view('rooms.create');
    }

    //inserisce l'oggetto nel DB
    public function store()
    {
        $this->valideteRoom();

        $room = new Room(request(['type', 'numroom', 'price', 'capacity']));
        $room->save();

        return redirect(route('rooms.show', $room->id));
    }

    //Mostra una vista per modificare un oggetto esistente
    public function edit(Room $room)
    {
        //compact è un modo veloce per scrivere ['article' => $article]
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

    protected function valideteRoom()
    {
        return request()->validate([
            'type' => 'required',
            'numroom' => 'required',
            'price' => 'required',
            'capacity' => 'required'
        ]);
    }

}
