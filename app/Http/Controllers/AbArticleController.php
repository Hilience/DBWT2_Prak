<?php
namespace App\Http\Controllers;

use App\Models\AbArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AbArticleController extends Controller
{
    public function articles(Request $request)
    {
        // Den Suchbegriff aus der URL abfragen
        $search = $request->query('search');

        // Artikel abfragen, entweder alle oder nach Namen filtern
        $articles = AbArticle::query()
            ->when($search, function ($query, $search) {
                // Fall-insensitive Suche nach ab_name
                return $query->where('ab_name', 'ILIKE', "%{$search}%");
            })
            ->get();

        return view('articleseite', compact('articles', 'search'));
    }

    public function meinearticles(Request $request)
    {
        // Den Suchbegriff aus der URL abfragen
        $search = $request->query('search');

        // Die User-ID aus der Session holen
        $userId = session('abalo_user_id');

        // Nur Artikel dieses Users abfragen, optional mit Suchfilter
        $articles = AbArticle::query()
            ->where('ab_creator_id', $userId)
            ->when($search, function ($query, $search) {
                // Fall-insensitive Suche nach ab_name
                return $query->where('ab_name', 'ILIKE', "%{$search}%");
            })
            ->get();

        return view('meineArticles', compact('articles', 'search'));
    }


    // Methode zum Anzeigen des Formulars für den neuen Artikel
    public function showCreateForm()
    {
        return view('createArticle');
    }

    // Methode zum Speichern des neuen Artikels
    public function store(Request $request)
    {
        // Validierung der Eingabedaten
        $request->validate([
            'ab_name' => 'required|string|max:255',
            'ab_price' => 'required|numeric|min:0.01',
            'ab_description' => 'required|string',
            'ab_image' => 'nullable|image',
        ]);

        // Artikel in die Datenbank speichern
        $article = new AbArticle();
        $article->ab_name = $request->ab_name;
        $article->ab_price = $request->ab_price;
        $article->ab_description = $request->ab_description;
        $article->ab_creator_id = session('abalo_user_id');
        $article->save();

        if ($request->hasFile('ab_image')) {
            // Das Bild direkt im public/images-Ordner speichern
            $image = $request->file('ab_image');
            $imageName = $article->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        // Nach dem Speichern den Benutzer zurück zur Artikelseite schicken
        return redirect()->route('articles')->with('success', 'Artikel erfolgreich hinzugefügt!');
    }
}
