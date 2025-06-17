<x-auth-layout>


    <h2>🤖 Chatbot AutoGo</h2>

    <form id="chat-form">
        @csrf
        <textarea id="message" rows="4" cols="50" placeholder="Scrivi un messaggio..."></textarea><br>
        <button type="submit">Invia</button>
    </form>

    <div id="chat-response" style="margin-top:20px; font-weight: bold;"></div>

    <a href="{{ route('dashboard') }}">← Torna alla Dashboard</a>

    <script src="{{ asset('js/chatbot.js') }}"></script>


</x-auth-layout>
