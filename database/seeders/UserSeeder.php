<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Pfad zur CSV-Datei im public/csv/ Verzeichnis
        $file = public_path('csv/user.csv');

        // Überprüfen, ob die Datei existiert
        if (File::exists($file)) {
            // Datei öffnen
            $handle = fopen($file, 'r');

            // CSV-Daten lesen und Zeile für Zeile verarbeiten
            // Überspringen der Kopfzeile
            $header = fgetcsv($handle, 1000, ';');

            // Zeilen einlesen und verarbeiten
            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                // Die CSV-Daten in ein assoziatives Array umwandeln
                $userData = [
                    'id' => $data[0], // ID aus der CSV
                    'ab_name' => $data[1], // Name aus der CSV
                    'ab_password' => Hash::make($data[2]), // Passwort verschlüsseln
                    'ab_mail' => $data[3], // E-Mail aus der CSV
                ];

                // Daten in die ab_user Tabelle einfügen
                DB::table('ab_user')->insert($userData);
            }

            // Datei schließen
            fclose($handle);
        } else {
            // Falls die Datei nicht gefunden wurde
            echo "Die Datei 'user.csv' wurde nicht gefunden.";
        }
    }
}
