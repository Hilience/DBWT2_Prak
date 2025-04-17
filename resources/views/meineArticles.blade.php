<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angebotene Artikel</title>
    @vite(['resources/css/nav.css', 'resources/js/nav.js'])
    <link rel="stylesheet" href="{{ asset('css/meinearticleSeite.css') }}">
</head>
<body>
<!-- Sticky Header -->
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

<h1>Angebotene Artikel</h1>

<!-- Flexbox Container für Suchfeld und Button -->
<div class="search-and-create">
    <!-- Suchformular -->
    <form action="{{ url('/articles') }}" method="get" class="search-form">
        <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Nach Artikel suchen">
        <button type="submit">Suchen</button>
    </form>

    <!-- Button zum Erstellen eines neuen Artikels -->
    <a href="{{ route('createArticle') }}" class="create-article-button">Neuen Artikel erstellen</a>
</div>

<!-- Artikel Tabelle -->
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Preis</th>
        <th>Beschreibung</th>
        <th>Bild</th>
    </tr>
    </thead>
    <tbody>
    @forelse($articles as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->ab_name }}</td>
            <td>{{ $article->ab_price }}</td>
            <td>{{ $article->ab_description }}</td>
            <td>
                @php
                    // Unterstützte Bildformate
                    $extensions = ['jpg', 'jpeg', 'png'];
                    $imageUrl = null;
                    foreach ($extensions as $ext) {
                        $imagePath = public_path("images/{$article->id}.{$ext}");
                        if (file_exists($imagePath)) {
                            $imageUrl = asset("images/{$article->id}.{$ext}");
                            break;
                        }
                    }
                @endphp

                @if($imageUrl)
                    <img src="{{ $imageUrl }}" alt="{{ $article->ab_name }}" width="300" height="200">
                @else
                    <p>Kein Bild verfügbar</p>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">Keine Artikel gefunden.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
