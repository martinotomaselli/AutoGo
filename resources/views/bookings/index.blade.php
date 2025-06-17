<x-auth-layout>
   


    <div class="container mt-5">
        <h2>Le tue prenotazioni</h2>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($bookings->isEmpty())
            <p class="mt-3">Non hai ancora effettuato prenotazioni.</p>
        @else
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Veicolo</th>
                        <th>Targa</th>
                        <th>Periodo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->vehicle->marca }} {{ $booking->vehicle->modello }}</td>
                            <td>{{ $booking->vehicle->targa }}</td>
                            <td>{{ $booking->data_inizio }} → {{ $booking->data_fine }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-4">← Torna alla Dashboard</a>
    </div>

</x-auth-layout>
