<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index($id)
    {
        $sections = Section::where('id_C', $id)->get();
        $courid=$id;
        return view('management.section.index', compact('sections','id'));
    }
    // public function coursvalider($id)
    // {
    //     $cours = Cour::where('id_U', $id)
    //         ->where('valider', '1')
    //         ->orderBy('id_C', 'desc')
    //         ->paginate(9);
    //     return view('management.cour.index', compact('cours'));
    // }
    // public function coursnonvalider($id)
    // {
    //     $cours = Cour::where('id_U', $id)
    //         ->where('valider', '0')
    //         ->orderBy('id_C', 'desc')
    //         ->paginate(9);
    //     return view('management.cour.index', compact('cours'));
    // }
    public function create($id)
    {
        // dd($id);
        $categories = Categorie::all();
        return view('management.cour.create', compact('categories'));
    }

    // public function store(SectionRequest $request)
    // {
    //     $creator = Auth::id();
    //     $validatedData = $request->validated();
    //     $validatedData['id_U'] = $creator;

    //     Cour::create($validatedData);

    //     return redirect()->route('cour.index')->with('success', 'Cour created successfully');
    // }

    // public function edit($id)
    // {
    //     // $cour = Cour::find($id);
    //     $cour = Cour::with('sujet')->find($id);
    //     // $sujets= Sujet::find($cour->id_Sj); 
    //     // $sujets = Sujet::find($cour->id_Sj)->get();
    //     // dd($cour->id_Sj);
    //     $sujets = Sujet::where('id_Sj', $cour->id_Sj)->get();

    //     // dd($cour->id_Sj);
    //     // $souscategories = SousCategorie::find($sujets->id_SCat)->get();
    //     // $souscategories = SousCategorie::all();
    //     // dd($souscategories);
    //     // $categories = Categorie::all();, 'categories', 'souscategories'
    //     // $categories= Categorie::find($souscategories->id_Cat);
    //     return view('management.cour.edit', compact('cour', 'sujets'));
    // }
    // public function valider($id)
    // {
    //     $Cour = Cour::find($id);

    //     $Cour->update([
    //         'valider' => true,
    //     ]);
    //     return redirect()->route('cour.index')->with('success', 'Cour updated successfully');
    // }
    // public function update(SectionRequest $request, $id)
    // {
    //     $Cour = Cour::find($id);
    //     if (!$Cour) {
    //         return redirect()->route('cour.index')->with('error', 'Cour not found');
    //     }
    //     $Cour->update($request->validated());
    //     return redirect()->route('cour.index')->with('success', 'Cour updated successfully');
    // }

    // public function destroy($id)
    // {
    //     Cour::find($id)->delete();
    //     return redirect()->route('cour.index')->with('success', 'Cour deleted successfully');
    // }
}
