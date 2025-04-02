<?php

namespace App\Http\Controllers;

use App\Models\AbTestData;
use Illuminate\Http\Request;

class AbTestDataController extends Controller
{
    // Diese Methode liest alle Daten aus der Tabelle und gibt sie an die View "testview" weiter
    public function testindex()
    {
        // Alle Daten aus der Tabelle ab_testdata holen
        $testData = AbTestData::all();

        return view('testview', compact('testData'));
    }
}
