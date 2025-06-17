<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /* ─────────────────────────  LISTA PRENOTAZIONI  ───────────────────────── */
    public function index()
    {
        // tutte le prenotazioni dell’utente loggato, con i dati del veicolo
        $bookings = Auth::user()
                        ->bookings()
                        ->with('vehicle')
                        ->orderByDesc('data_inizio')
                        ->get();

        return view('bookings.index', compact('bookings'));
    }

    /* ─────────────────────────  FORM PRENOTA  ─────────────────────────────── */
    public function create(Vehicle $vehicle)
    {
        // mostra il form di prenotazione per uno specifico veicolo
        return view('bookings.create', compact('vehicle'));
    }

    /* ─────────────────────────  SALVA PRENOTAZIONE  ───────────────────────── */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id'  => 'required|exists:vehicles,id',
            'data_inizio' => 'required|date|after_or_equal:today',
            'data_fine'   => 'required|date|after_or_equal:data_inizio',
        ]);

        Booking::create([
            'user_id'     => Auth::id(),
            'vehicle_id'  => $request->vehicle_id,
            'data_inizio' => $request->data_inizio,
            'data_fine'   => $request->data_fine,
        ]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Prenotazione creata con successo!');
    }
}
