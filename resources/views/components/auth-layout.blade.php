<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Auth - AutoGo</title>

    {{--  Vite: CSS generali + stile navbar  --}}
    @vite([
        'resources/css/app.css',
           
        'resources/js/app.js'
    ])
</head>

<body>

    {{--  NAVBAR globale  --}}
    <x-nav />

    {{--  Contenuto specifico di ciascuna pagina (login, register, dashboard…)  --}}
    <main class="container py-4">
        {{ $slot }}
    </main>

    {{--  Footer fisso  --}}
    <footer class="text-center mt-4 text-muted"
            style="padding:20px; background:#0000aa; color:#ffffff; position:fixed; bottom:0; width:100%;">
        © {{ date('Y') }} AutoGo - Tutti i diritti riservati
    </footer>

</body>
</html>
