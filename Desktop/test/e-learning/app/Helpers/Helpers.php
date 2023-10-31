<?php

namespace App\Helpers;

use App\Models\Categorie;
use App\Models\Cour;
use App\Models\Media;
use App\Models\Section;
use App\Models\Session;
use App\Models\SousCategorie;
use App\Models\Sujet;
use App\Models\Video;
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
    public static function generateIdSess()
    {
        $idSess = Str::random(15);
        while (Session::where('id_Sess', $idSess)->exists()) {
            $idSess = Str::random(15);
        }
        return $idSess;
    }
    public static function generateIdv()
    {
        $idV = Str::random(15);
        while (Video::where('id_V', $idV)->exists()) {
            $idV = Str::random(15);
        }
        return $idV;
    }
    public static function generateIdM()
    {
        $idM = Str::random(15);
        while (Media::where('id_M', $idM)->exists()) {
            $idM = Str::random(15);
        }
        return $idM;
    }
}
