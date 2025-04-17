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
        ]);

        // Benutzer-ID aus der Session holen
        $userId = $request->session()->get('abalo_user_id'); // ID des angemeldeten Benutzers

        // Sicherstellen, dass der Benutzer eingeloggt ist
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Bitte loggen Sie sich ein, um einen Artikel hinzuzufügen.');
        }

        // Artikel in die Datenbank speichern
        $article = new AbArticle();
        $article->ab_name = $request->ab_name;
        $article->ab_price = $request->ab_price;
        $article->ab_description = $request->ab_description;
        $article->ab_creator_id = $userId; // Die ID des Benutzers wird hier gespeichert
        $article->save();

        // Nach dem Speichern den Benutzer zurück zur Artikelseite schicken
        return redirect()->route('articles')->with('success', 'Artikel erfolgreich hinzugefügt!');
    }
}
