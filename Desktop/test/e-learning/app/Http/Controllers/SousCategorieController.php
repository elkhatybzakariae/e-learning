<?php

namespace App\Http\Controllers;

use App\Http\Requests\SousCategorieRequest;
use App\Models\Categorie;
use App\Models\SousCategorie;
use Illuminate\Http\Request;

class SousCategorieController extends Controller
{
    public function index(){
        $souscategories = SousCategorie::orderBy('id_SCat', 'desc')->get(); 
        return view('management.souscategorie.index', compact('souscategories'));
    }


    public function create()
    {
        $categorie= Categorie::all();
        return view('management.souscategorie.create',compact('categorie'));
    }

    public function store(SousCategorieRequest $request)
    {
        
        $validatedData = $request->validated();
        SousCategorie::create($validatedData);
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

    public function update(SousCategorieRequest $request, $id)
    {
        
        $SousCategorie = SousCategorie::find($id);
        if (!$SousCategorie) {
            return redirect()->route('souscategorie.index')->with('error', 'SousCategorie not found');
        }
        $SousCategorie->update($request->validated());
        return redirect()->route('souscategorie.index')->with('success', 'SousCategorie updated successfully');
    }

    public function destroy($id)
    {
        SousCategorie::find($id)->delete();
        return redirect()->route('souscategorie.index')->with('success', 'sousCategorie deleted successfully');
    }
}
