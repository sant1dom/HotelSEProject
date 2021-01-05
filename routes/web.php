<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\ModelsController\AdminController;
use App\Http\Controllers\ModelsController\ContactsController;
use App\Http\Controllers\ModelsController\RoomsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelsController\ServicesController;
use App\Http\Controllers\ModelsController\GuestsController;

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


/**
 * Routes for the users authentication
 */
Auth::routes(['verify' => true]);

/**
 * Route for the home view
 */
Route::get('/', function (){
    return view('home');
})->name('home');

/**
 * Routes for the rooms views
 */
Route::prefix('admin')->group(function() {
    Route::resource('/rooms', RoomsController::class)->middleware('auth:admin');
});

Route::get('/rooms', [RoomsController::class, 'userIndex'])->name('rooms.userIndex');
Route::get('/rooms/{id}', [RoomsController::class, 'userShow'])->name('rooms.userShow');

/**
 * Routes for the contacts views
 */
Route::prefix('admin')->group(function() {
    Route::resource('/contacts', ContactsController::class)->middleware('auth:admin');
});
Route::get('/contacts',[ContactsController::class, 'index_users']);

/**
 * Routes for the services views
 */
Route::resource('services', ServicesController::class)->middleware('auth:admin');

/**
 * Routes for the guests views
 */
Route::resource('guests', GuestsController::class);

/**
 * Route for the booking view
 */
Route::get('/booking', function () {
    return view('booking');
});

//se dovesse servire c'è una vista vuota per i test <3
Route::get('/test', function () {
    return view('test');
});

/**
 * Route for the admin authentication
 */
Route::prefix('admin')->group(function() {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.home')->middleware('auth:admin');
});


