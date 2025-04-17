<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neuen Artikel hinzufügen</title>
    <link rel="stylesheet" href="{{ asset('css/createarticle.css') }}">
</head>
<body>

<!-- Blauer Header mit User-Info -->
<header class="header">
    <div class="header-right">
        @if(session('abalo_user'))
            <span>Angemeldet als: {{ session('abalo_user') }}</span>
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        @else
            <span>Du bist nicht eingeloggt.</span>
        @endif
    </div>
</header>


<main class="form-wrapper">
    <h2>Neuen Artikel hinzufügen</h2>

    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('storeArticle') }}" method="POST">
        @csrf
        <div>
            <label for="ab_name">Name des Artikels:</label>
            <input type="text" id="ab_name" name="ab_name" required>
        </div>
        <div>
            <label for="ab_price">Preis:</label>
            <input type="number" id="ab_price" name="ab_price" step="0.01" min="0.01" required>
        </div>
        <div>
            <label for="ab_description">Beschreibung:</label>
            <textarea id="ab_description" name="ab_description" rows="4" required></textarea>
        </div>
        <div>
            <button type="submit">Artikel speichern</button>
        </div>
    </form>

    <a href="{{ route('articles') }}">Zurück zur Artikelliste</a>
</main>

</body>
</html>
