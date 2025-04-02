<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbTestData extends Model
{
    use HasFactory;

    protected $table = 'ab_testdata';  // Tabelle in der Datenbank
    public $timestamps = false;  // Falls deine Tabelle keine Timestamps hat
    protected $fillable = ['id', 'name'];  // Anpassen an die tatsächlichen Spalten deiner Tabelle
}
