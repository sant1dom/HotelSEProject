<?php

namespace App\Http\Controllers\ModelsController;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Room;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestsController extends Controller
{
    //

    public function index()
    {
        $guests = Auth::user()->guests()->get();
        return view('guests.index', compact('guests'));
    }

    /**public function userIndex()
    {
        $guests = Auth::user()->guests()->get();
        return view('guests.userIndex', compact('guests'));
    }**/


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
    public function store(Request $request)
    {
        $this->validateGuest();

        $names = $request->name;
        $surnames = $request->surname;
        $birthdates = $request->birthdate;
        $doctypes = $request->doctype;
        $numdocs = $request->numdoc;

        for($count = 0; $count < count($names); $count++)
        {
            $user_id = Auth::user()->id;
            $guest = new Guest([
                'name' => $names[$count],
                'surname' => $surnames[$count],
                'birthdate' => $birthdates[$count],
                'doctype' => $doctypes[$count],
                'numdoc' => $numdocs[$count],
                'user_id' => $user_id,
            ]);
            $guest->save();
        }

        $user = Auth::user();
        $guests = Auth::user()->guests()->get();
        $max = Room::where('id', 'LIKE', $request->ourRooms)->first()->capacity;
        return view('bookings.stepTwo', compact('guests', 'request', 'user', 'max'))->with('success', 'Guests created successfully.');
    }

    //Mostra una vista per modificare un oggetto esistente
    public function edit(Guest $guest)
    {
        return view('guests.edit', compact('guest'));
    }

    //aggiorna nel database l'oggetto con la modifica
    public function update(Guest $guest, Request $request)
    {
        $this->validateGuest($request);
        $guest->update($request->all());
        return redirect()->route('guests.index')
            ->with('success', 'Guest updated successfully');
    }

    //elimina l'oggetto dal database
    public function destroy(Guest $guest)
    {

    }

    protected function validateGuest()
    {
        return request()->validate([
            'name' => 'required',
            'name.*' => 'required',
            'surname' => 'required',
            'surname.*' => 'required',
            'birthdate' => 'required',
            'birthdate.*' => 'required',
            'doctype' => 'required',
            'doctype.*' => 'required',
            'numdoc' => 'required',
            'numdoc.*' => 'required',
        ]);
    }
}
