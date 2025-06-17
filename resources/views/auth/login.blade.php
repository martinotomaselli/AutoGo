{{-- resources/views/auth/login.blade.php --}}
<x-auth-layout>

    <h2>Accedi</h2>

    {{-- errori di validazione --}}
    @if ($errors->any())
        <div style="color:red;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label>Email:</label><br>
            <input type="email" name="email" required>
        </div>

        <div style="margin-top:10px;">
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </div>

        <div style="margin-top:15px;">
            <button type="submit">Login</button>
        </div>
    </form>

</x-auth-layout>
