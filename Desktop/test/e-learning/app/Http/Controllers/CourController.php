<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\Categorie;
use App\Models\Cour;
use App\Models\SousCategorie;
use App\Models\Sujet;
use Illuminate\Http\Request;

class CourController extends Controller
{
    public function index($id = null)
    {
        if ($id === null) {
            $cours = Cour::where('valider', '0')->orderBy('id_C', 'desc')->paginate(9);
            return view('management.cour.index', compact('cours'));
        } else {
            $cours = Cour::where('id_U', $id)->orderBy('id_C', 'desc')->paginate(9);
            return view('management.cour.index', compact('cours'));
        }
    }
    public function coursvalider($id)
    {
        $cours = Cour::where('id_U', $id)
            ->where('valider', '1')
            ->orderBy('id_C', 'desc')
            ->paginate(9);
        return view('management.cour.index', compact('cours'));
    }
    public function coursnonvalider($id)
    {
        $cours = Cour::where('id_U', $id)
            ->where('valider', '0')
            ->orderBy('id_C', 'desc')
            ->paginate(9);
        return view('management.cour.index', compact('cours'));
    }
    public function create()
    {
        // dd('ggg');
        $categories = Categorie::all();
        return view('management.cour.create', compact('categories'));
    }

    public function store(CourRequest $request)
    {
        $creator = Auth::id();
        $validatedData = $request->validated();
        $validatedData['id_U'] = $creator;

        Cour::create($validatedData);

        return redirect()->route('cour.index')->with('success', 'Cour created successfully');
    }

    public function edit($id)
    {
        // $cour = Cour::find($id);
        $cour = Cour::with('sujet')->find($id);
        // $sujets= Sujet::find($cour->id_Sj); 
        // $sujets = Sujet::find($cour->id_Sj)->get();
        // dd($cour->id_Sj);
        // $sujets = Sujet::where('id_Sj', $cour->id_Sj)->get();

        // dd($sujets);
        // $souscategories = SousCategorie::find($sujets->id_SCat)->get();
        // $souscategories = SousCategorie::all();
        // dd($souscategories);
        // $categories = Categorie::all();, 'categories', 'souscategories', 'sujets'
        // $categories= Categorie::find($souscategories->id_Cat);
        return view('management.cour.edit', compact('cour'));
    }
    // public function souscat($id)
    // {
    //     $listchildren = Cour::all();
    //     dd($listchildren->Cour);
    //     return view('management.listchildren', compact('listchildren'));
    // }

    public function valider($id)
    {
        $Cour = Cour::find($id);

        $Cour->update([
            'valider' => true,
        ]);
        return redirect()->route('cour.index')->with('success', 'Cour updated successfully');
    }
    public function update(CourRequest $request, $id)
    {
        dd($request->all());
        $Cour = Cour::find($id);
        if (!$Cour) {
            return redirect()->route('cour.index')->with('error', 'Cour not found');
        }
        $Cour->update($request->validated());
        return redirect()->route('cour.index')->with('success', 'Cour updated successfully');
    }

    public function destroy($id)
    {
        Cour::find($id)->delete();
        return redirect()->route('cour.index')->with('success', 'Cour deleted successfully');
    }
}
