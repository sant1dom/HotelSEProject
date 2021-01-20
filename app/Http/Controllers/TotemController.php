<?php


namespace App\Http\Controllers;


class TotemController extends Controller
{
    public function menu(){
        return view('totem.totemMenu');
    }

    public function checkin(){
        return view('totem.totemMenu');
    }

    public function checkout(){
        return view('totem.totemMenu');
    }

    public function changeCard(){
        return view('totem.totemMenu');
    }
}
