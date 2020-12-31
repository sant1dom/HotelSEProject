<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestsController extends Controller
{
    //

    public function index()
    {
        $guests = Guest::latest()->get();

        return view('guests.index',compact('guests'));
    }

    //Mostra un SINGOLO SPECIFICO oggetto
    public function show(Guest $guest) //Guest $guest
    {
        $guest = Guest::findOrFail(1);

        return view('guests.show', ['guest' => $guest]);
    }

    //Mostra una vista per creare un nuovo oggetto
    public function create()
    {

    }

    //inserisce l'oggetto nel DB
    public function store()
    {

    }

    //Mostra una vista per modificare un oggetto esistente
    public function edit(Guest $guest)
    {

    }

    //aggiorana nel database l'oggetto con la modifica
    public function update(Guest $guest)
    {

    }

    //elimina l'oggetto dal database
    public function destroy(Guest $guest)
    {

    }
}
