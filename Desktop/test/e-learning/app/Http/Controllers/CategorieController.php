<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::orderBy('id_Cat', 'desc')->paginate(9);
        return view('management.categorie.index', compact('categories'));
    }


    public function create()
    {
        return view('management.categorie.create');
    }

    public function store(CategorieRequest $request)
    {
        $validatedData = $request->validated();
        Categorie::create($validatedData);
        return redirect()->route('categorie.index')->with('success', 'Categorie created successfully');
    }

    public function edit($id)
    {
        $categorie = Categorie::find($id);
        return view('management.categorie.edit', compact('categorie'));
    }
    // public function souscat($id)
    // {
    //     $listchildren = Categorie::all();
    //     dd($listchildren->sousCategorie);
    //     return view('management.listchildren', compact('listchildren'));
    // }

    public function update(CategorieRequest $request, $id)
    {

        $Categorie = Categorie::find($id);
        if (!$Categorie) {
            return redirect()->route('categorie.index')->with('error', 'Categorie not found');
        }
        $Categorie->update($request->validated());
        return redirect()->route('categorie.index')->with('success', 'Categorie updated successfully');
    }

    public function destroy($id)
    {
        Categorie::find($id)->delete();
        return redirect()->route('categorie.index')->with('success', 'Categorie deleted successfully');
    }
}
