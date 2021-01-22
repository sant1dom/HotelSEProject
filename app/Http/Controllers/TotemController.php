<?php


namespace App\Http\Controllers;


class TotemController extends Controller
{
    public function menu(){
        return view('totem.totemMenu');
    }

    public function checkinView(){
        return view('totem.checkinView');
    }

    public function checkin(){
        return redirect()->route('totem.menu')
            ->with('success','Check-in successful, now you can withdraw your cards and enjoy your stay in our hotel!');
    }

    public function checkoutView(){
        return view('totem.checkoutView');
    }

    public function checkout(){
        return redirect()->route('totem.menu')
            ->with('success','Check-out successful, insert all the cards into the reader. Thanks and come back soon!');
    }

    public function changeCard(){
        return view('totem.totemMenu');
    }
}
