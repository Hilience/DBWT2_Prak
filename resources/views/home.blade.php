<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/css/nav.css', 'resources/js/nav.js'])
</head>
<body>

<header class="header">
    <div class="header-content">
        <!-- Menü LINKS -->
        <nav id="nav"></nav>

        <!-- Benutzerinfo RECHTS -->
        <div class="user-info">
            @if(session('abalo_user'))
                <span>{{ session('abalo_user') }}</span>
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            @endif
        </div>
    </div>
</header>

<main>
    <!-- Dein Seiteninhalt -->
</main>

<footer id="cookie_check"></footer>
<script src="{{ asset('js/cookieFenster.js') }}"></script>
</body>
</html>
