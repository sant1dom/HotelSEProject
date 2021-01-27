<?php

namespace App\Http\Controllers\ModelsController;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{

    public function index()
    {
        $bookings = Booking::orderBy('to')->Paginate(10);
        //return view('bookings.index', compact('bookings'));
        $rooms = Room::all()->unique('type');

        return view('home', compact('rooms'));
    }

    public function userIndex()
    {
        $bookings = Booking::where('user_id', 'LIKE', Auth::user()->id)->get()->sortBy('from');

        return view('bookings.userIndex', compact('bookings'));
    }


    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function showStepOne(Request $request)
    {
        $rooms = Room::all()->unique('type');
        if ($request != null) {
            return view('bookings.stepOne', compact('rooms', 'request'));
        } else {
            return view('bookings.stepOne', compact('rooms'));
        }
    }

    public function showStepTwo(Request $request)
    {
        $this->validateStepOne($request);
        $user = Auth::user();
        $guests = Auth::user()->guests()->get();
        return view('bookings.stepTwo', compact('guests', 'request', 'user'));
    }

    public function showStepThree(Request $request)
    {
        $this->validateStepTwo($request);
        $services = Service::all();

        return view('bookings.stepThree', compact('services', 'request'));
    }

    public function showStepFour(Request $request)
    {

        $this->validateStepThree($request);
        $room = Room::where('id', 'LIKE', $request->ourRooms)->first();

        $guestsId = [];
        foreach ($request->guest as $i => $id){
            $guestsId[$i] = $request->guest[$i];
        }
        $guests = Guest::whereIn('id', $guestsId )->get()->sortBy('id');

        if($request->service != null){
            $servicesId = [];
            foreach ($request->service as $i => $id){
                $servicesId[$i] = $request->service[$i];
            }
            $services = Service::whereIn('id', $servicesId )->get()->sortBy('id');

            return view('bookings.stepFour', compact('guests', 'services', 'request', 'room'));
        } else {
            return view('bookings.stepFour', compact('guests', 'request', 'room'));
        }
    }


    public function confirmation(Request $request)
    {
        $this->validateBooking($request);
        return view('userIndex');
    }

    //inserisce l'oggetto nel DB
    public function store(Request $request)
    {
        $booking = new Booking(request(['from', 'to']));
        $booking->user_id = Auth::user()->id;
        $booking->save();

        $room = Room::find($request->ourRooms);
        $booking->rooms()->attach($room);

        foreach ($request->guest as $guest) {
            $mTmGuest = Guest::find($guest);
            $booking->guests()->attach($mTmGuest);
        }

        if ($request->has('service')) {
            foreach ($request->service as $service) {
                $mTmService = Service::find($service);
                $booking->services()->attach($mTmService);
            }
        }




        return redirect()->route('bookings.userIndex')
            ->with('success', 'Booking created successfully.');
    }


    public function edit(Booking $booking)
    {
        //compact è un modo veloce per scrivere ['article' => $article]
        return view('bookings.edit', compact('booking'));
    }

    //elimina l'oggetto dal database

    public function update(Booking $booking, Request $request)
    {
        $this->validateBooking($request);
        $booking->update($request->all());
        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully');
    }

    public function destroy(Booking $booking)
    {
    }

    protected function validateStepOne(Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
        ]);
    }

    protected function validateStepTwo(Request $request)
    {
        $this->validate($request, [
            'guest' => 'required',
        ]);
    }

    protected function validateStepThree(Request $request)
    {
        $this->validate($request, [
            //TODO: deve validare se ha scelto il numero di giorni
        ]);
    }
}
