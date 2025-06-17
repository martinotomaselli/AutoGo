<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Modifica Veicolo</title>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
</head>
<body style="text-align:center; font-family:sans-serif;">
    <x-nav />

    <h2>Modifica veicolo</h2>

    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="marca" value="{{ $vehicle->marca }}" placeholder="Marca" required><br><br>
        <input type="text" name="modello" value="{{ $vehicle->modello }}" placeholder="Modello" required><br><br>
        <input type="text" name="targa" value="{{ $vehicle->targa }}" placeholder="Targa" required><br><br>
        <input type="number" name="posti" value="{{ $vehicle->posti }}" placeholder="Posti" required><br><br>
        <input type="number" name="prezzo_giornaliero" step="0.01" value="{{ $vehicle->prezzo_giornaliero }}" placeholder="Prezzo al giorno" required><br><br>

        <button type="submit" class="btn">Salva modifiche</button>
    </form>

    <br><a href="{{ route('vehicles.index') }}">← Torna ai veicoli</a>
</body>
</html>
