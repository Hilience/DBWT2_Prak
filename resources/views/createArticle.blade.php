<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neuen Artikel hinzufügen</title>
    <link rel="stylesheet" href="{{ asset('css/createarticle.css') }}">
</head>
<body>
    <h2>Neuen Artikel hinzufügen</h2>

    <!-- Fehlermeldungen anzeigen -->
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Erfolgsnachricht anzeigen -->
@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<!-- Formular für die Eingabe des neuen Artikels -->
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

<br>
<a href="{{ route('articles') }}">Zurück zur Artikelliste</a>
</body>
</html>
