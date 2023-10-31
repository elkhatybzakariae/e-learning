<?php

namespace App\Helpers;

use App\Models\Categorie;
use App\Models\Cour;
use App\Models\Section;
use App\Models\SousCategorie;
use App\Models\Sujet;
use Illuminate\Support\Str;
class Helpers
{
    public static function generateIdCat()
    {
        $idCat = Str::random(15);
        while (Categorie::where('id_Cat', $idCat)->exists()) {
            $idCat = Str::random(15);
        }
        return $idCat;
    }
    public static function generateIdSCat()
    {
        $idSCat = Str::random(15);
        while (SousCategorie::where('id_SCat', $idSCat)->exists()) {
            $idSCat = Str::random(15);
        }
        return $idSCat;
    }
    public static function generateIdSj()
    {
        $idSj = Str::random(15);
        while (Sujet::where('id_Sj', $idSj)->exists()) {
            $idSj = Str::random(15);
        }
        return $idSj;
    }
    public static function generateIdC()
    {
        $idC = Str::random(15);
        while (Cour::where('id_C', $idC)->exists()) {
            $idC = Str::random(15);
        }
        return $idC;
    }
    public static function generateIdSec()
    {
        $idSec = Str::random(15);
        while (Section::where('id_Sec', $idSec)->exists()) {
            $idSec = Str::random(15);
        }
        return $idSec;
    }
}
