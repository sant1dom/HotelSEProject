<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\ModelsController\AdminController;
use App\Http\Controllers\ModelsController\BookingsController;
use App\Http\Controllers\ModelsController\ContactsController;
use App\Http\Controllers\ModelsController\ReportController;
use App\Http\Controllers\ModelsController\RoomsController;
use App\Http\Controllers\TotemController;
use App\Models\Room;
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

Route::get('/test', function () {
    return view('test');
})->name('test');

/**
 * Routes for the users authentication
 */
Auth::routes(['verify' => true]);

/**
 * Route for the home view
 */
Route::get('/', function () {
    $rooms = Room::take(4)->get()->unique('type');
    return view('home', compact('rooms'));
})->name('home');

Route::get('/home', function () {
    return redirect('/');
});

/**
 * Routes for the rooms views
 */
Route::get('/rooms', [RoomsController::class, 'userIndex'])->name('rooms.userIndex');
Route::get('/rooms/disableRoom{room}', [RoomsController::class, 'disable'])->name('rooms.disable')->middleware('auth:admin');
Route::get('/contacts', [ContactsController::class, 'index_users'])->name('contacts.userIndex');
Route::get('/services/disableService{service}', [ServicesController::class, 'disable'])->name('services.disable')->middleware('auth:admin');
Route::get('/rooms/delImage', [RoomsController::class, 'deleteImage'])->name('rooms.deleteImage')->middleware('auth:admin');

Route::get('/services', [ServicesController::class, 'index_users'])->name('services.userIndex');


/**
 * Routes for the guests views
 */
Route::resource('guests', GuestsController::class)->middleware('auth');

/**
 * Route for the booking view
 */
Route::resource('bookings', BookingsController::class)->middleware('auth');
Route::get('confirmation', [BookingsController::class, 'confirmation'])->name('bookings.confirmation');

/**
 * Route for the admin operations
 */
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth:admin');
    Route::resource('contacts', ContactsController::class)->middleware('auth:admin');
    /**
     * Routes for the services views
     */
    Route::resource('services', ServicesController::class)->middleware('auth:admin');
    /**
     * Routes for the rooms views
     */
    Route::resource('rooms', RoomsController::class)->middleware('auth:admin');

    /**
     * Routes for report generation
     */
    Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports')->middleware('auth:admin');
    Route::get('/reports/users', [ReportController::class, 'usersIndex'])->name('admin.users.index')->middleware('auth:admin');
    Route::get('/reports/users/{user}', [ReportController::class, 'usersShow'])->name('report.users.show')->middleware('auth:admin');
    Route::get('/reports/users/{user}/pdf', [ReportController::class, 'usersReport'])->name('report.users.pdf')->middleware('auth:admin');
    Route::get('/reports/services', [ReportController::class, 'servicesIndex'])->name('admin.services.index')->middleware('auth:admin');
    Route::get('/reports/services/{service}', [ReportController::class, 'servicesReport'])->name('report.services.pdf')->middleware('auth:admin');
});

Route::prefix('totem')->group(function() {
    Route::get('/menu', [TotemController::class, 'menu'])->name('totem.menu');
    Route::get('/checkin', [TotemController::class, 'checkin'])->name('totem.checkin');
    Route::get('/checkout', [TotemController::class, 'checkout'])->name('totem.checkout');
    Route::get('/changeCard', [TotemController::class, 'changeCard'])->name('totem.changeCard');
});


