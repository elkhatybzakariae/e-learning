<?php

namespace App\Http\Controllers;

use App\Models\SousCategorie;
use App\Models\Sujet;
use Illuminate\Http\Request;

class SujetController extends Controller
{
    public function index(){
        $sujets = Sujet::paginate(9); 
        return view('management.sujet.index', compact('sujets'));
    }


    public function create()
    {
        $souscategorie= SousCategorie::all();
        return view('management.sujet.create',compact('souscategorie'));
    }

    public function store(Request $request)
    {
        $v = $request->validate([
            'SCatName' => 'required|string|max:100',
            'id_Cat' => 'required|exists:Sujets,id_Cat',
        ]);
        Sujet::create([
            'SCatName'=>$v['SCatName'],
            'id_Cat'=>$v['id_Cat'],
        ]);

        return redirect()->route('Sujet.index')->with('success', 'Sujet created successfully');
    }

    public function edit($id)
    {
        $Sujet= Sujet::all();
        $Sujet = Sujet::find($id);
        return view('management.Sujet.edit', compact('Sujet','Sujet'));
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
            'SCatName' => 'required|string|max:100',
            'id_Cat' => 'required|exists:Sujets,id_Cat',
        ]);

        $Sujet->update($v);
        return redirect()->route('Sujet.index')->with('success', 'Sujet updated successfully');
    }

    public function destroy($id)
    {
        Sujet::find($id)->delete();
        return redirect()->route('sujet.index')->with('success', 'Sujet deleted successfully');
    }
}
