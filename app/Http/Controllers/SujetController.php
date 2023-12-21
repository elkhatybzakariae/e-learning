<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\SujetRequest;
use App\Models\Categorie;
use App\Models\SousCategorie;
use App\Models\Sujet;
use Illuminate\Http\Request;

class SujetController extends Controller
{
    public function index(){
        // $sujets = Sujet::latest()->paginate(9); 
        $sujets = Sujet::orderBy('id_Sj', 'desc')->get();
        return view('management.sujet.index', compact('sujets'));
    }


    public function create()
    {
        $categories= Categorie::all();
        $souscategorie= SousCategorie::all();
        return view('management.sujet.create',compact('souscategorie','categories'));
    }

    public function store(SujetRequest $request)
    {
        $customIdSj = Helpers::generateIdSj();
        $validatedData = $request->validated();

        $validatedData['id_Sj'] = $customIdSj;
        Sujet::create($validatedData);
        return redirect()->route('sujet.index')->with('success', 'Sujet created successfully');
    }

    public function edit($id)
    {
        $souscategories= SousCategorie::all();
        $sujet = Sujet::find($id);
        if (!$sujet) {
            return view('404');
        }
        return view('management.Sujet.edit', compact('sujet','souscategories'));
    }
    // public function souscat($id)
    // {
    //     $listchildren = Sujet::all();
    //     dd($listchildren->Sujet);
    //     return view('management.listchildren', compact('listchildren'));
    // }

    public function update(SujetRequest $request, $id)
    {
        $Sujet = Sujet::find($id);
        if (!$Sujet) {
            return redirect()->route('sujet.index')->with('error', 'Sujet not found');
        }
        $Sujet->update($request->validated());
        return redirect()->route('sujet.index')->with('success', 'Sujet updated successfully');
    }

    public function destroy($id)
    {
        Sujet::find($id)->delete();
        return redirect()->route('sujet.index')->with('success', 'Sujet deleted successfully');
    }
}
