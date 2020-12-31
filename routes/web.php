<?php

use App\Http\Controllers\RoomsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\GuestsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contacts', function () {
    return view('contacts');
});

Route::resource('rooms', RoomsController::class);

Route::resource('services', ServicesController::class);

Route::resource('guests', GuestsController::class);

Route::get('/booking', function () {
    return view('booking');
});

//se dovesse servire c'è una vista vuota per i test <3
Route::get('/test', function () {
    return view('test');
});
