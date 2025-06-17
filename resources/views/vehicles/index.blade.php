<x-auth-layout>
    
    <h1>Veicoli disponibili</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('vehicles.create') }}" class="btn">Aggiungi nuovo veicolo</a>

    <table border="1" cellpadding="10" style="margin-top:20px;">
        <tr>
            <th>Marca</th>
            <th>Modello</th>
            <th>Targa</th>
            <th>Posti</th>
            <th>Prezzo/giorno</th>
            <th>Azioni</th>
        </tr>
        @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->marca }}</td>
                <td>{{ $vehicle->modello }}</td>
                <td>{{ $vehicle->targa }}</td>
                <td>{{ $vehicle->posti }}</td>
                <td>€ {{ $vehicle->prezzo_giornaliero }}</td>
                <td>
                    <a href="{{ route('vehicles.edit', $vehicle) }}">Modifica</a> |
                    <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Sicuro di voler eliminare?')">Elimina</button>
                    </form>
                    <a href="{{ route('bookings.create', $vehicle->id) }}" class="btn">Prenota</a>
                </td>
            </tr>
        @endforeach
      
    </table>

</x-auth-layout>
