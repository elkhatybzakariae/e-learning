<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\CourRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\Categorie;
use App\Models\Cour;
use App\Models\SousCategorie;
use App\Models\Sujet;
use Illuminate\Http\Request;

class CourController extends Controller
{
    public function index()
    {
        $id=Auth::id();
        if ($id === null) {
            $cours = Cour::where('valider', '0')->orderBy('id_C', 'desc')->get();
            return view('management.cour.index', compact('cours'));
        } else {
            $cours = Cour::where('id_U', $id)->orderBy('id_C', 'desc')->get();
            return view('management.cour.index', compact('cours'));
        }
    }
    public function coursvalider()
    {
        $id=Auth::id();
        $cours = Cour::where('id_U', $id)
            ->where('valider', '1')
            ->orderBy('id_C', 'desc')
            ->get();
        return view('management.cour.index', compact('cours'));
    }
    public function coursnonvalider()
    {
        $id=Auth::id();
        $cours = Cour::where('id_U', $id)
            ->where('valider', '0')
            ->orderBy('id_C', 'desc')
            ->get();
        return view('management.cour.index', compact('cours'));
    }
    public function create()
    {
        $categories = Categorie::all();
        return view('management.cour.create', compact('categories'));
    }

    public function store(CourRequest $request)
    {
        
        $creator = Auth::id();
        $customIdC = Helpers::generateIdC();
        $validatedData = $request->validated();

        $validatedData['id_C'] = $customIdC;
        $validatedData['id_U'] = $creator;

        Cour::create($validatedData);
        return redirect()->route('cour.index')->with('success', 'Cour created successfully');
    }

    public function edit($id)
    {
        $cour = Cour::with('sujet')->find($id);
        if (!$cour) {
            return view('404');
        }
        $sujets = Sujet::where('id_Sj', $cour->id_Sj)->get();
        return view('management.cour.edit', compact('cour', 'sujets'));
    }

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
