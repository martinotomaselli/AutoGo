
<x-auth-layout>
    <!-- <x-nav /> -->

    <h1>Nuova prenotazione</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">

        <p><strong>Veicolo:</strong> {{ $vehicle->marca }} {{ $vehicle->modello }}</p>

        <div>
            <label for="data_inizio">Data inizio:</label>
            <input type="date" name="data_inizio" required>
        </div>

        <div>
            <label for="data_fine">Data fine:</label>
            <input type="date" name="data_fine" required>
        </div>

        <br>
        <button type="submit" class="btn">Conferma Prenotazione</button>
    </form>

    <br>
    <a href="{{ route('dashboard') }}">← Torna alla Dashboard</a>

</x-auth-layout>
