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
        // dd($request);
        $id = Auth::id();
        $idP = Helpers::generateIdP();
        $idC = $request->input('id');
        // $response =Panier::created([
        //     'id' => $idP,
        //     'id_U' => $id,
        //     'id_C' => $idC,
        // ]);
        // // $response = ['message' => 'Data received successfully'];
        // return response()->json($response);
        $response = Panier::create([
            'id' => $idP,
            'id_U' => $id,
            'id_C' => $idC,
        ]);

        // Return a JSON response with the created record (or appropriate response data)
        return response()->json($response);
    }
}
