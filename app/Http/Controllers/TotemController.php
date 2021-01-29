<?php


namespace App\Http\Controllers;

use App\Models\Booking;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TotemController extends Controller
{
    public function menu()
    {
        return view('totem.totemMenu');
    }

    public function checkinView()
    {
        return view('totem.checkinView');
    }

    public function checkin(Request $request)
    {
        $booking = Booking::where('booking_code', 'LIKE', $request->booking_code)->first();
        if (isset($booking)) {
            $user = User::where('email', 'LIKE', $request->email);
            $dateNow = Carbon::now()->toDateTimeString();
            if (isset($user)) {
                if (!($booking->check_in)) {
                    if (!($booking->from == $dateNow)) {
                        $booking->check_in = 1;
                        $booking->save();
                    } else {
                        return redirect()->route('totem.checkinView')
                            ->with('error', 'Check-in failed, your check-in is not today, check your booking for all the information!');
                    }
                } else {
                    return redirect()->route('totem.checkinView')
                        ->with('error', 'Check-in failed, check-in already executed.');
                }
            } else {
                return redirect()->route('totem.checkinView')
                    ->with('error', 'Check-in failed, the email is incorrect or the booking do not exist.');
            }
        } else {
            return redirect()->route('totem.checkinView')
                ->with('error', 'Check-in failed, the code is incorrect or the booking do not exist.');
        }

        return redirect()->route('totem.menu')
            ->with('success', 'Check-in successful, now you can withdraw your cards and enjoy your stay in our hotel!');
    }

    public function checkoutView()
    {
        return view('totem.checkoutView');
    }

    public function checkout(Request $request)
    {
        $booking = Booking::where('booking_code', 'LIKE', $request->booking_code)->first();
        if (isset($booking)) {
            $user = User::where('email', 'LIKE', $request->email);
            if (isset($user)) {
                if (!($booking->check_in)) {
                    if (!($booking->check_out)) {
                        $booking->check_out = 1;
                        $booking->save();
                    } else {
                        return redirect()->route('totem.checkoutView')
                            ->with('error', 'Check-out failed, Check-out already done.');
                    }
                } else {
                    return redirect()->route('totem.checkoutView')
                        ->with('error', 'Check-out failed, the Check-in was not done.');
                }
            } else {
                return redirect()->route('totem.checkoutView')
                    ->with('error', 'Check-out failed, the email is incorrect or the booking do not exist.');
            }
        } else {
            return redirect()->route('totem.checkoutView')
                ->with('error', 'Check-out failed, the code is incorrect or the booking do not exist.');
        }

        return redirect()->route('totem.menu')
            ->with('success', 'Check-out successful, insert all the cards into the reader. Thanks and come back soon!');
    }

    public function changeCard()
    {
        return view('totem.totemMenu');
    }
}
