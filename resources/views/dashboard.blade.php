{{-- resources/views/dashboard.blade.php --}}
<x-auth-layout>

    <!-- <x-nav /> -->


    <div class="text-center" style="max-width:600px;margin:auto;">
        <h1>Benvenuto nella tua Dashboard, {{ Auth::user()->name }}!</h1>

        <hr>

        {{-- Riepilogo --}}
        <div class="mb-4">
            <h4>📊 Riepilogo rapido</h4>
            <ul class="list-unstyled">
                <li>🚗 <strong>Veicoli totali:</strong> {{ $totalVehicles }}</li>
                <li>📅 <strong>Le tue prenotazioni:</strong> {{ $userBookings }}</li>
                <li>🆕 <strong>Ultimo veicolo:</strong>
                    {{ $lastVehicle ? $lastVehicle->marca . ' ' . $lastVehicle->modello : 'Nessuno' }}
                </li>
            </ul>
        </div>

        <!-- {{-- Link rapidi --}}
        <div class="d-flex justify-content-center gap-2">
            <a href="{{ route('vehicles.index') }}" class="btn btn-dark">Gestisci veicoli</a>
            <a href="{{ route('bookings.index') }}" class="btn btn-dark">Le tue prenotazioni</a>
        </div> -->

        {{-- Logout --}}
        <!-- <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-secondary">Logout</button>
        </form>
        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">← Torna alla Home</a>
        </div> -->
        
    </div>

</x-auth-layout>

