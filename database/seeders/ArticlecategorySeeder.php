<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ArticlecategorySeeder extends Seeder
{
    public function run()
    {
        // Pfad zur CSV-Datei im public/csv/ Verzeichnis
        $file = public_path('csv/articlecategory.csv');

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
                    'id' => $data[0],
                    'ab_name' => $data[1],
                    'ab_parent' => $data[2] == 'NULL' ? null : $data[2],
                ];

                // Daten in die ab_user Tabelle einfügen
                DB::table('ab_articlecategory')->insert($userData);
            }

            // Datei schließen
            fclose($handle);
        } else {
            // Falls die Datei nicht gefunden wurde
            echo "Die Datei 'user.csv' wurde nicht gefunden.";
        }
    }
}
