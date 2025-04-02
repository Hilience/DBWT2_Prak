<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikelübersicht</title>
</head>
<body>
<h1>Artikelübersicht</h1>

<!-- Suchformular -->
<form action="{{ url('/articles') }}" method="get">
    <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Nach Artikel suchen">
    <button type="submit">Suchen</button>
</form>

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
            // Bildpfad erstellen (z.B. images/1.png)
            $imagePath = public_path('images/' . $article->id . '.jpg');
            @endphp

            <!-- Bild anzeigen, wenn vorhanden -->
            @if(file_exists($imagePath))
            <img src="{{ asset('images/' . $article->id . '.jpg') }}" alt="{{ $article->ab_name }}" width="100" height="100">
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
