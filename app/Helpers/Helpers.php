<?php

namespace App\Helpers;

use App\Models\Categorie;
use App\Models\Certificate;
use App\Models\CertPasser;
use App\Models\Cour;
use App\Models\Media;
use App\Models\Message;
use App\Models\Panier;
use App\Models\QRPasser;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizPasser;
use App\Models\Reponse;
use App\Models\Role;
use App\Models\Role_User;
use App\Models\Section;
use App\Models\Session;
use App\Models\SousCategorie;
use App\Models\Sujet;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoTerminer;
use App\Models\WishList;
use Illuminate\Support\Str;
class Helpers
{
    public static function generateIdU()
    {
        $idU = Str::random(15);
        while (User::where('id_U', $idU)->exists()) {
            $idU = Str::random(15);
        }
        return $idU;
    }
    public static function generateIdUR()
    {
        $id = Str::random(15);
        while (Role_User::where('id', $id)->exists()) {
            $id = Str::random(15);
        }
        return $id;
    }
    public static function generateIdRole()
    {
        $id_R = Str::random(15);
        while (Role::where('id_R', $id_R)->exists()) {
            $id_R = Str::random(15);
        }
        return $id_R;
    }
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
    public static function generateIdCert()
    {
        $idCert = Str::random(15);
        while (Certificate::where('id_Cert', $idCert)->exists()) {
            $idCert = Str::random(15);
        }
        return $idCert;
    }
    public static function generateIdQ()
    {
        $idQ = Str::random(15);
        while (Quiz::where('id_Q', $idQ)->exists()) {
            $idQ = Str::random(15);
        }
        return $idQ;
    }
    public static function generateIdQues()
    {
        $idQue = Str::random(15);
        while (Question::where('id_Que', $idQue)->exists()) {
            $idQue = Str::random(15);
        }
        return $idQue;
    }
    public static function generateIdQR()
    {
        $idR = Str::random(15);
        while (Reponse::where('id_R', $idR)->exists()) {
            $idR = Str::random(15);
        }
        return $idR;
    }
    public static function generateIdP()
    {
        $id = Str::random(15);
        while (Panier::where('id', $id)->exists()) {
            $id = Str::random(15);
        }
        return $id;
    }
    public static function generateIdW()
    {
        $id = Str::random(15);
        while (WishList::where('id', $id)->exists()) {
            $id = Str::random(15);
        }
        return $id;
    }
    public static function generateIdVT()
    {
        $id = Str::random(15);
        while (VideoTerminer::where('id_VT', $id)->exists()) {
            $id = Str::random(15);
        }
        return $id;
    }
    public static function generateIdQP()
    {
        $id = Str::random(15);
        while (QuizPasser::where('id_QP', $id)->exists()) {
            $id = Str::random(15);
        }
        return $id;
    }
    public static function generateIdQRP()
    {
        $id = Str::random(15);
        while (QRPasser::where('id_QRP', $id)->exists()) {
            $id = Str::random(15);
        }
        return $id;
    }
    public static function generateIdCertP()
    {
        $id = Str::random(15);
        while (CertPasser::where('id_CertP', $id)->exists()) {
            $id = Str::random(15);
        }
        return $id;
    }
    public static function generateIdMess()
    {
        $id = Str::random(15);
        while (Message::where('id_Mess', $id)->exists()) {
            $id = Str::random(15);
        }
        return $id;
    }
}
