<?php

namespace App\Http\Controllers\ModelsController;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
    * Show the application dashboard.
    *
    */
    public function index()
    {
        return view('admin.dashboard');
    }
}
