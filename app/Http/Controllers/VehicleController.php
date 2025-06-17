<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    /* ─────────────────────────────  LISTA  ───────────────────────────── */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /* ───────────────────────  FORM NUOVO VEICOLO  ─────────────────────── */
    public function create()
    {
        return view('vehicles.create');
    }

    /* ────────────────────────  SALVA NUOVO  ───────────────────────────── */
    public function store(Request $request)
    {
        $request->validate([
            'marca'             => 'required|string|max:100',
            'modello'           => 'required|string|max:100',
            'targa'             => 'required|string|max:10|unique:vehicles,targa',
            'posti'             => 'required|integer|min:1',
            'prezzo_giornaliero'=> 'required|numeric|min:0',
        ]);

        Vehicle::create($request->only([
            'marca',
            'modello',
            'targa',
            'posti',
            'prezzo_giornaliero',
        ]));

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Veicolo aggiunto con successo!');
    }

    /* ─────────────────────────  FORM EDIT  ───────────────────────────── */
    public function edit(Vehicle $vehicle)      // <-- type-hint corretto
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /* ────────────────────────  SALVA EDIT  ───────────────────────────── */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'marca'             => 'required|string|max:100',
            'modello'           => 'required|string|max:100',
            'targa'             => 'required|string|max:10|unique:vehicles,targa,' . $vehicle->id,
            'posti'             => 'required|integer|min:1',
            'prezzo_giornaliero'=> 'required|numeric|min:0',
        ]);

        $vehicle->update($request->only([
            'marca',
            'modello',
            'targa',
            'posti',
            'prezzo_giornaliero',
        ]));

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Veicolo aggiornato con successo!');
    }

    /* ─────────────────────────  DELETE  ──────────────────────────────── */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Veicolo eliminato con successo!');
    }
}
