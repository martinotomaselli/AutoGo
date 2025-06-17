{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>AutoGo</title>

    {{-- Vite: Bootstrap + home.css --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <x-nav />

    {{-- VIDEO DI SFONDO --}}
    <video autoplay muted loop class="video-bg">
        <source src="{{ asset('video/autogo.mp4') }}" type="video/mp4">
    </video>

    {{-- CONTENUTO CENTRALE --}}
    <div class="centered-content">

        <h1 class="mb-4" style="font-weight:700;">Benvenuto su AutoGo</h1>

        @auth
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('dashboard') }}" class="btn">Vai alla Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn" type="submit">Logout</button>
                </form>
            </div>
        @else
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('login') }}"     class="btn">Login</a>
                <a href="{{ route('register') }}"  class="btn">Registrati</a>
            </div>
        @endauth

    </div>

    {{-- FOOTER FISSO --}}
    <footer>
        © {{ date('Y') }} AutoGo - Tutti i diritti riservati
    </footer>

    {{-- Chatbot AutoGo – in basso a destra --}}
    <div id="chatbot-container">
        <h2>🤖 Chatbot AutoGo</h2>

    <form id="chat-form">
        @csrf
        <textarea id="message" rows="4" placeholder="Scrivi un messaggio..."></textarea><br>
        <button type="submit">Invia</button>
    </form>

    <div id="chat-response"></div>
</div>

<script src="{{ asset('js/chatbot.js') }}"></script>


</body>
</html>
