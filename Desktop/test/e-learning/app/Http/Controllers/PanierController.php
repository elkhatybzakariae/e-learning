<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function index(){
        $id=Auth::id();
        $listid= Panier::where('id_U',$id)->get();
        $ids = $listid->pluck('id_C')->all();
        $listC = Cour::whereIn('id_C', $ids)->get();
        return view('management.panier.index',compact('listC'));
    }
}
