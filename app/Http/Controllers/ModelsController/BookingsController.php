<?php

namespace App\Http\Controllers\ModelsController;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingsController extends Controller
{

    public function index()
    {
        $bookings = Booking::orderBy('to')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function userIndex()
    {
        $bookings = Booking::where('user_id', 'LIKE', Auth::user()->id)->get()->sortBy('from');

        return view('bookings.userIndex', compact('bookings'));
    }

    public function userShow(Request $request)
    {
        return view('bookings.userShow', compact('request'));
    }

    public function edit(Booking $booking){
        if (Auth::user()->email != $booking->user->email) {
            return redirect('/');
        }
        else{
            $allServices = Service::all();
            $bookingServices = $booking->Services()->get();
            $selectedServices = $booking->Services()->get()->unique('name');
            $guests = $booking->Guests()->get();
            $room = $booking->Rooms()->first();
           /* return view('bookings.addservice', compact('booking', 'services'));*/
            return view('bookings.edit', compact('booking', 'allServices','bookingServices','selectedServices' ,'room', 'guests'));
        }
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

        $from = $request->from;
        $to = $request->to;

        $bookings = Booking::whereDate('from', '<=', $from)->whereDate('to', '>=', $to)->first();
        if($bookings != null && $bookings->rooms[0]->id == $request->ourRooms){
            return redirect()->route('bookings.stepOne')
                ->with('error', 'We are sorry! This room is not available on these dates.');
        }
        $guests = Auth::user()->guests()->get();
        return view('bookings.stepTwo', compact('guests', 'request'));
    }

    public function showStepThree(Request $request)
    {
        $room = Room::where('id', 'LIKE', $request->ourRooms)->first();
        $this->validateStepTwo($request, $room->capacity);
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

    //inserisce l'oggetto nel DB
    public function store(Request $request)
    {
        $booking = new Booking(request(['from', 'to']));
        $booking->user_id = Auth::user()->id;
        $booking->booking_code = Str::random(6);
        $booking->save();

        $room = Room::find($request->ourRooms);
        $booking->rooms()->attach($room);

        foreach ($request->guest as $guest) {
            $mTmGuest = Guest::find($guest);
            $booking->guests()->attach($mTmGuest);
        }


        if ($request->has('service')) {
            foreach ($request->service as $i => $service) {
                $mTmService = Service::find($service);
                foreach ($request->optionDays[$i] as $j=> $option) {
                    $booking->services()->attach($mTmService, [
                        'date' => $option]);
                }
            }
        }

        return redirect()->route('bookings.userIndex')
            ->with('success', 'Booking created successfully.');
    }

    //elimina l'oggetto dal database

    public function update(Booking $booking, Request $request)
    {
        $this->validateStepThree($request);
        if ($request->has('service')) {
            foreach ($request->service as $i => $service) {
                $mTmService = Service::find($service);
                foreach ($request->optionDays[$i] as $j=> $option) {
                    $booking->services()->attach($mTmService, [
                        'date' => $option]);
                }
            }
        }
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

    protected function validateStepTwo(Request $request, $capacity)
    {
        $this->validate($request, [
            'guest' => "required|max: $capacity",
        ]);
    }

    protected function validateStepThree(Request $request)
    {
        $this->validate($request, [
/*            'optionDays' => 'required|array',
            'optionDays.*' => 'required|integer',
            'optionDays.*.*' => 'required',*/
    //TODO: da sistemare perchè funziona male
        ]);
    }
}
