<?php

namespace App\Http\Controllers\ModelsController;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{

    public function index()
    {
        $bookings = Booking::orderBy('to')->Paginate(10);
        return view('bookings.index', compact('bookings'));
    }

    //Mostra un SINGOLO SPECIFICO oggetto
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    //Mostra una vista per creare un nuovo oggetto
    public function create(Request $request)
    {
        $services = Service::all()->unique('name');
        $rooms = Room::all()->unique('type');
        $guests = Auth::user()->guests()->get();
        $user = Auth::user();
        $userIndexRoomId = $request->userIndexRoomId;

        if ($userIndexRoomId != null) {
            return view('bookings.create', compact('rooms', 'services', 'guests', 'user', 'userIndexRoomId'));
        } else {
            return view('bookings.create', compact('rooms', 'services', 'guests', 'user'));
        }
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
        $user = Auth::user();
        $guests = Auth::user()->guests()->get();
        return view('bookings.stepTwo', compact('guests', 'request', 'user'));
    }

    public function showStepThree(Request $request)
    {
        $services = Service::all()->unique('name');
        return view('bookings.stepThree', compact('services', 'request'));
    }

    public function showStepFour(Request $request)
    {
        return view('bookings.stepFour', compact('request'));
    }


    public function confirmation(Request $request)
    {
        $this->validateBooking($request);
        return view('bookings.confirmation', $request);
    }

    //inserisce l'oggetto nel DB
    public function store(Request $request)
    {
        $this->validateBooking($request);

        Booking::create($request->all());
        return redirect()->route('bookings.index')
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

    protected function validateBooking(Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
        ]);
    }
}
