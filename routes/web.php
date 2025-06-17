<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;



/* --------------------------------------------------- */
/* HOME                                                */
/* --------------------------------------------------- */
// Route::get('/', function () {
//     // Se l'utente è loggato reindirizzalo subito alla dashboard
//     if (Auth::check()) {
//         return redirect()->route('dashboard');
//     }
//     return view('welcome');
// })->name('home');

Route::get('/', function () {
    return view('welcome');   // nessun redirect
})->name('home');

/* --------------------------------------------------- */
/* AUTENTICAZIONE                                      */
/* --------------------------------------------------- */
Route::get('/login',     [AuthController::class, 'loginForm'])->name('login');
Route::post('/login',    [AuthController::class, 'login']);
Route::get('/register',  [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout',   [AuthController::class, 'logout'])->name('logout');

/* --------------------------------------------------- */
/* DASHBOARD (protetta da middleware 'auth')           */
/* --------------------------------------------------- */
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

     // ROTTE CRUD VEICOLI
    Route::resource('vehicles', VehicleController::class);

    // ROTTE CRUD PRENOTAZIONI
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create/{vehicle}', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

});
/* --------------------------------------------------- */
/* CHATBOT (protetta da middleware 'auth')              */
Route::get('/chatbot', function () {
    return view('chatbot');
})->middleware('auth')->name('chatbot');

