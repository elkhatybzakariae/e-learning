<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\SousCategorie;
use Illuminate\Http\Request;

class SousCategorieController extends Controller
{
    public function index(){
        $souscategories = SousCategorie::paginate(9); 
        return view('management.souscategorie.index', compact('souscategories'));
    }


    public function create()
    {
        $categorie= Categorie::all();
        return view('management.souscategorie.create',compact('categorie'));
    }

    public function store(Request $request)
    {
        $v = $request->validate([
            'SCatName' => 'required|string|max:100',
            'id_Cat' => 'required|exists:categories,id_Cat',
        ]);
        SousCategorie::create([
            'SCatName'=>$v['SCatName'],
            'id_Cat'=>$v['id_Cat'],
        ]);

        return redirect()->route('souscategorie.index')->with('success', 'SousCategorie created successfully');
    }

    public function edit($id)
    {
        $categorie= Categorie::all();
        $souscategorie = SousCategorie::find($id);
        return view('management.souscategorie.edit', compact('souscategorie','categorie'));
    }
    // public function souscat($id)
    // {
    //     $listchildren = Categorie::all();
    //     dd($listchildren->sousCategorie);
    //     return view('management.listchildren', compact('listchildren'));
    // }

    public function update(Request $request, $id)
    {
        $souscategorie = SousCategorie::find($id);
        $v = $request->validate([
            'SCatName' => 'required|string|max:100',
            'id_Cat' => 'required|exists:categories,id_Cat',
        ]);

        $souscategorie->update($v);
        return redirect()->route('souscategorie.index')->with('success', 'sousCategorie updated successfully');
    }

    public function destroy($id)
    {
        SousCategorie::find($id)->delete();
        return redirect()->route('souscategorie.index')->with('success', 'sousCategorie deleted successfully');
    }
}
