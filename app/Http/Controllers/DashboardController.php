<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;
use App\Models\Booking;

class DashboardController extends Controller
{
    /**
     * Mostra la dashboard dell’utente loggato.
     */
    public function index()
    {
        $user = Auth::user();

        // Statistiche veloci
        $totalVehicles = Vehicle::count();
        $userBookings  = $user->bookings()->count();
        $lastVehicle   = Vehicle::latest()->first();   // null se non esiste ancora

        return view('dashboard', compact(
            'totalVehicles',
            'userBookings',
            'lastVehicle'
        ));
    }
}
