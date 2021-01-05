<?php

namespace App\Http\Controllers\ModelsController;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingsController extends Controller
{

    public function index()
    {
        $bookings = Booking::orderBy('type')->simplePaginate(10);
        return view('bookings.index', compact('bookings'));
    }

    //Mostra un SINGOLO SPECIFICO oggetto
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    //Mostra una vista per creare un nuovo oggetto
    public function create()
    {
        return view('bookings.create');
    }

    //inserisce l'oggetto nel DB
    public function store(Request $request)
    {
        $this->validateBooking($request);

        Booking::create($request->all());
        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully.');
    }

    //Mostra una vista per modificare un oggetto esistente

    protected function validateBooking(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|max:255|string',
            'booking_string' => 'required|max:255|string',
        ]);
    }

    //aggiorana nel database l'oggetto con la modifica

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

}
