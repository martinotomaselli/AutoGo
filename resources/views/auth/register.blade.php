<x-auth-layout>
    <h2>Registrati</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Nome" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="password" name="password_confirmation" placeholder="Conferma Password" required><br><br>
        <button type="submit">Registrati</button>
    </form>
</x-auth-layout>
