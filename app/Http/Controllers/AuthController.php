<?php

namespace App\Http\Controllers;

use App\Models\AbUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Anmeldefunktion
    public function login(Request $request)
    {
        // Validierung
        $request->validate([
            'ab_name' => 'required',
            'ab_password' => 'required',
        ]);

        // Benutzer suchen und Passwort überprüfen
        $user = AbUser::where('ab_name', $request->ab_name)->first();

        if ($user && Hash::check($request->ab_password, $user->ab_password)) {
            $request->session()->put('abalo_user', $user->ab_name);
            $request->session()->put('abalo_mail', $user->ab_mail);
            $request->session()->put('abalo_time', time());
            return redirect()->route('testdata');
        }

        return redirect()->route('login')->with('error', 'Falsche Anmeldedaten.');
    }

    // Registrieren eines neuen Benutzers
    public function register(Request $request)
    {
        // Validierung
        $request->validate([
            'ab_name' => 'required|unique:ab_user',
            'ab_mail' => 'required|email|unique:ab_user',
            'ab_password' => 'required|confirmed|min:6',
        ]);

        // Benutzer erstellen
        $user = new AbUser();
        $user->ab_name = $request->ab_name;
        $user->ab_mail = $request->ab_mail;
        $user->ab_password = Hash::make($request->ab_password);
        $user->save();

        return redirect()->route('login')->with('success', 'Benutzer erfolgreich registriert. Bitte melden Sie sich an.');
    }

    // Logout-Funktion
    public function logout(Request $request)
    {
        $request->session()->flush(); // Löscht alle Session-Daten
        return redirect()->route('login');
    }

    // Prüfen, ob der Benutzer eingeloggt ist
    public function isLoggedIn(Request $request)
    {
        if ($request->session()->has('abalo_user')) {
            $r["user"] = $request->session()->get('abalo_user');
            $r["time"] = $request->session()->get('abalo_time');
            $r["mail"] = $request->session()->get('abalo_mail');
            $r["auth"] = "true";
        } else {
            $r["auth"] = "false";
        }
        return response()->json($r);
    }
}

/*
public function login(Request $request) {
    $request->session()->put('abalo_user', 'visitor');
    $request->session()->put('abalo_mail', 'visitor@abalo.example.com');
    $request->session()->put('abalo_time', time());
    return redirect()->route('haslogin');
}

public function logout(Request $request) {
    $request->session()->flush();
    return redirect()->route('haslogin');
}


public function isLoggedIn(Request $request) {
    if($request->session()->has('abalo_user')) {
        $r["user"] = $request->session()->get('abalo_user');
        $r["time"] = $request->session()->get('abalo_time');
        $r["mail"] = $request->session()->get('abalo_mail');
        $r["auth"] = "true";
    }
    else $r["auth"]="false";
    return response()->json($r);
}*/
