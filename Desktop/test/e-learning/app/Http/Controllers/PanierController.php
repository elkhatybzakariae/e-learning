<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Cour;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $listid = Panier::where('id_U', $id)->get();
        $ids = $listid->pluck('id_C')->all();
        $listC = Cour::whereIn('id_C', $ids)->get();
        return view('management.panier.index', compact('listC'));
    }
    public function store(Request $request)
    {
        $id = Auth::id();
        $idP = Helpers::generateIdP();
        $idC = $request->input('id');
        $inpanier = Panier::where('id_C', $idC)->where('id_U', $id)->first();
        if (!$inpanier) {
            $response = Panier::create([
                'id' => $idP,
                'id_U' => $id,
                'id_C' => $idC,
            ]);
        }
        return response()->json($response);
    }
    public function delete(Request $request,$idC)
    {
        $id = Auth::id();
        $inpanier = Panier::where('id_C', $idC)->where('id_U', $id)->first();
        if ($inpanier) {
            $inpanier->delete();
        }
        return redirect()->back();
    }
}
