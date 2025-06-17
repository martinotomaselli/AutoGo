<x-auth-layout>
    <x-nav />


    <h1>Aggiungi un nuovo veicolo</h1>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf
        <input type="text" name="marca" placeholder="Marca" required><br><br>
        <input type="text" name="modello" placeholder="Modello" required><br><br>
        <input type="text" name="targa" placeholder="Targa" required><br><br>
        <input type="number" name="posti" placeholder="Numero posti" required><br><br>
        <input type="number" step="0.01" name="prezzo_giornaliero" placeholder="Prezzo al giorno" required><br><br>
        <button type="submit">Salva</button>
    </form>

</x-auth-layout>
