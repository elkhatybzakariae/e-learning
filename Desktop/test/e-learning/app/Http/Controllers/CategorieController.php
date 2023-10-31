<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Helpers\Helpers;


class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::orderBy('id_Cat', 'desc')->get();
        return view('management.categorie.index', compact('categories'));
    }


    public function create()
    {
        return view('management.categorie.create');
    }



    public function store(CategorieRequest $request)
    {
        $customIdCat = Helpers::generateIdCat();
        $validatedData = $request->validated();

        $validatedData['id_Cat'] = $customIdCat;
        Categorie::create($validatedData);
        return redirect()->route('categorie.index')->with('success', 'Categorie created successfully');
    }

    public function edit($id)
    {
        $categorie = Categorie::find($id);
        if (!$categorie) {
            return view('404');
        }
        return view('management.categorie.edit', compact('categorie'));
    }
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
