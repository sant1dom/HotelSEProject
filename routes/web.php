<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\ModelsController\AdminController;
use App\Http\Controllers\ModelsController\BookingsController;
use App\Http\Controllers\ModelsController\ContactsController;
use App\Http\Controllers\ModelsController\RoomsController;
use App\Models\Room;
use http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelsController\ServicesController;
use App\Http\Controllers\ModelsController\GuestsController;
use Symfony\Component\Console\Input\Input;


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
Route::get('/rooms', [RoomsController::class, 'userIndex'])->name('rooms.userIndex');
Route::get('/rooms/disableRoom{room}', [RoomsController::class, 'disable'])->name('rooms.disable')->middleware('auth:admin');
Route::get('/contacts',[ContactsController::class, 'index_users'])->name('contacts.userIndex');
Route::get('/rooms/disableService{service}', [ServicesController::class, 'disable'])->name('services.disable')->middleware('auth:admin');
/**
 * Routes for the guests views
 */
Route::resource('guests', GuestsController::class);

/**
 * Route for the booking view
 */
Route::resource('bookings', BookingsController::class);
Route::get('confirmation', [BookingsController::class, 'confirmation'])->name('bookings.confirmation');


//se dovesse servire c'è una vista vuota per i test <3
Route::get('/test', function () {
    return view('test');
})->name('test');

/**
 * Route for the admin authentication
 */
Route::prefix('admin')->group(function() {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth:admin');
    Route::get('/reports', [AdminLoginController::class, 'showReports'])->name('admin.reports');
    Route::resource('contacts', ContactsController::class)->middleware('auth:admin');
    /**
     * Routes for the services views
     */
    Route::resource('services', ServicesController::class)->middleware('auth:admin');
    Route::resource('rooms', RoomsController::class)->middleware('auth:admin');
});


