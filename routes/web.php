<?php

use App\Http\Controllers\RoomsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms.index');
Route::post('/rooms', [RoomsController::class, 'store'])->name('rooms.store');
Route::get('/rooms/create', [RoomsController::class, 'create'])->name('rooms.create');
Route::get('/rooms/{room}', [RoomsController::class, 'show'])->name('rooms.show');
Route::get('/rooms/{room}/edit', [RoomsController::class, 'edit'])->name('rooms.edit');
Route::put('/rooms/{room}', [RoomsController::class, 'update'])->name('rooms.update');

//se dovesse servire c'è una vista vuota per i test <3
Route::get('/test', function () {
    return view('test');
});
