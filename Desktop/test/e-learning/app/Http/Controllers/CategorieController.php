<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
class CategorieController extends Controller
{
    // public function index(){
    //     $categories = Categorie::all(); 
    //     return view('categorie.index', compact('categories'));
    // }


    // public function create()
    // {
    //     return view('categorie.create');
    // }

    // public function store(Request $request)
    // {
    //     $v = $request->validate([
    //         'CatName' => 'required|string|max:100',
    //     ]);

    //     Categorie::create($v);

    //     return redirect()->route('categorie.index')->with('success', 'Categorie created successfully');
    // }

    // public function edit($id)
    // {
    //     $categorie = Categorie::find($id);
    //     return view('categorie.edit', compact('categorie'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $Categorie = Categorie::find($id);
    //     $v = $request->validate([
    //         'CatName' => 'required|string|max:100',
    //     ]);

    //     $Categorie->update($v);
    //     return redirect()->route('categorie.index')->with('success', 'Categorie updated successfully');
    // }

    // public function destroy($id)
    // {
    //     Categorie::find($id)->delete();
    //     return redirect()->route('categorie.index')->with('success', 'Categorie deleted successfully');
    // }
}
