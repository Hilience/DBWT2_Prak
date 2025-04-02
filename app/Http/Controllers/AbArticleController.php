<?php

namespace App\Http\Controllers;

use App\Models\AbArticle;
use Illuminate\Http\Request;

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
}

