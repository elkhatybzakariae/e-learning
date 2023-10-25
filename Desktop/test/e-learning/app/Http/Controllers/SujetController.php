<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\SousCategorie;
use App\Models\Sujet;
use Illuminate\Http\Request;

class SujetController extends Controller
{
    public function index(){
        // $sujets = Sujet::latest()->paginate(9); 
        $sujets = Sujet::orderBy('id_Sj', 'desc')->paginate(9);
        return view('management.sujet.index', compact('sujets'));
    }


    public function create()
    {
        $categories= Categorie::all();
        $souscategorie= SousCategorie::all();
        return view('management.sujet.create',compact('souscategorie','categories'));
    }

    public function store(Request $request)
    {
        $v = $request->validate([
            'SjName' => 'required|string|max:100',
            'id_SCat' => 'required|exists:sous_categories,id_SCat',
        ]);
        Sujet::create([
            'SjName'=>$v['SjName'],
            'id_SCat'=>$v['id_SCat'],
        ]);

        return redirect()->route('sujet.index')->with('success', 'Sujet created successfully');
    }

    public function edit($id)
    {
        $souscategories= SousCategorie::all();
        $sujet = Sujet::find($id);
        return view('management.Sujet.edit', compact('sujet','souscategories'));
    }
    // public function souscat($id)
    // {
    //     $listchildren = Sujet::all();
    //     dd($listchildren->Sujet);
    //     return view('management.listchildren', compact('listchildren'));
    // }

    public function update(Request $request, $id)
    {
        $Sujet = Sujet::find($id);
        $v = $request->validate([
            'SjName' => 'required|string|max:100',
            'id_SCat' => 'required|exists:sous_categories,id_SCat',
        ]);

        $Sujet->update($v);
        return redirect()->route('sujet.index')->with('success', 'Sujet updated successfully');
    }

    public function destroy($id)
    {
        Sujet::find($id)->delete();
        return redirect()->route('sujet.index')->with('success', 'Sujet deleted successfully');
    }
}
