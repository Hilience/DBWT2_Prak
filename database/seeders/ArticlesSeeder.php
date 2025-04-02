<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ArticlesSeeder extends Seeder
{
    public function run()
    {
        // Pfad zur CSV-Datei im public/csv/ Verzeichnis
        $file = public_path('csv/articles.csv');

        // Überprüfen, ob die Datei existiert
        if (File::exists($file)) {
            // Datei öffnen
            $handle = fopen($file, 'r');

            // CSV-Daten lesen und Zeile für Zeile verarbeiten
            // Überspringen der Kopfzeile
            $header = fgetcsv($handle, 1000, ';');

            // Zeilen einlesen und verarbeiten
            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                $ab_price = floatval(str_replace(',', '.', $data[2]));

                $articleData = [
                    'id' => $data[0],
                    'ab_name' => $data[1],
                    'ab_price' => $ab_price,
                    'ab_description' => $data[3],
                    'ab_creator_id' => $data[4],
                    'ab_createdate' => $data[5],
                ];

                DB::table('ab_article')->insert($articleData);
            }

            // Datei schließen
            fclose($handle);
        } else {
            // Falls die Datei nicht gefunden wurde
            echo "Die Datei 'articles.csv' wurde nicht gefunden.";
        }
    }
}
