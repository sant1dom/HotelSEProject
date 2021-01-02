<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestsController extends Controller
{
    //

    public function index()
    {
        $guests= Guest::orderBy('name')->simplePaginate(10);;

        return view('guests.index',compact('guests'));
    }

    //Mostra un SINGOLO SPECIFICO oggetto
    public function show(Guest $guest) //Guest $guest
    {

        return view('guests.show', compact('guest'));
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

    //aggiorna nel database l'oggetto con la modifica
    public function update(Guest $guest)
    {

    }

    //elimina l'oggetto dal database
    public function destroy(Guest $guest)
    {

    }
}
