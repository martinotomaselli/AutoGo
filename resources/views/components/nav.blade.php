<nav class="nav-bar">
    {{-- Brand/logo --}}
    <div class="nav-brand">
        <a href="{{ route('home') }}">AutoGo</a>
    </div>

    {{-- Link principali --}}
    <ul class="nav-links">
        <li><a href="{{ route('dashboard')  }}"
               class="{{ request()->routeIs('dashboard') ? 'nav-active' : '' }}">
               Dashboard
        </a></li>

        @auth
            <li><a href="{{ route('vehicles.index') }}"
                   class="{{ request()->routeIs('vehicles.*') ? 'nav-active' : '' }}">
                   Veicoli
            </a></li>

            <li><a href="{{ route('bookings.index') }}"
                   class="{{ request()->routeIs('bookings.*') ? 'nav-active' : '' }}">
                   Prenotazioni
            </a></li>
        @endauth
    </ul>

    {{-- Area utente / auth --}}
    <div class="nav-user">
        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Registrati</a>
        @else
            <span>{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-logout">Logout</button>
            </form>
        @endguest
    </div>
</nav>
