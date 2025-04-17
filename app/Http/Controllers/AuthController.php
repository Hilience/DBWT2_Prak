<?php

namespace App\Http\Controllers;

use App\Models\AbUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            // Benutzername und weitere Daten in der Session speichern
            $request->session()->put('abalo_user', $user->ab_name);
            $request->session()->put('abalo_mail', $user->ab_mail);
            $request->session()->put('abalo_user_id', $user->id); // Speichert auch die ID in der Session
            $request->session()->put('abalo_time', time());
            return redirect()->route('home');
        }

        return redirect()->route('login')->with('error', 'Falsche Anmeldedaten.');
    }

    // Registrierung eines neuen Benutzers
    public function register(Request $request)
    {
        // Validierung
        $request->validate([
            'ab_name' => 'required|unique:ab_user',
            'ab_mail' => 'required|email|unique:ab_user',
            'ab_password' => 'required|confirmed|min:6',
        ]);

        // Benutzer-Daten vorbereiten
        $userData = [
            'ab_name' => $request->ab_name,
            'ab_mail' => $request->ab_mail,
            'ab_password' => Hash::make($request->ab_password), // Passwort vor Speicherung hashen
        ];

        // Benutzer in die Datenbank einfügen
        $user = AbUser::create($userData);

        // Erfolgsmeldung zurückgeben
        return redirect()->route('login')->with('success', 'Benutzer erfolgreich registriert. Bitte melden Sie sich an.');
    }

    // Logout-Funktion
    public function logout(Request $request)
    {
        $request->session()->flush(); // Löscht alle Session-Daten
        return redirect()->route('login');
    }
}
