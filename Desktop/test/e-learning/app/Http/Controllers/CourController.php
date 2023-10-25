<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Categorie;
use App\Models\Cour;
use App\Models\Sujet;
use Illuminate\Http\Request;

class CourController extends Controller
{
    public function index(){
        $cours = Cour::orderBy('id_C', 'desc')->paginate(9);
        return view('management.cour.index', compact('cours'));
    }
    public function create()
    {
        $categories= Categorie::all();
        return view('management.Cour.create',compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $v = $request->validate([
            'title' => 'required|string|max:100',
            'info' => 'required|string|max:100',
            'description' => 'required|string|max:100',
            'Prerequisites' => 'required|string|max:100',
            'price' => 'required|string|max:100',
            'coupon' => 'required|string|max:100',
            'id_Sj' => 'required|exists:sujets,id_Sj',
        ]);
        $creator= Auth::id();
        Cour::create([
            'title'=>$v['title'],
            'info'=>$v['info'],
            'description'=>$v['description'],
            'Prerequisites'=>$v['Prerequisites'],
            'price'=>$v['price'],
            'coupon'=>$v['coupon'],
            'id_U'=>$creator,
            'id_Sj'=>$v['id_Sj'],
        ]);

        return redirect()->route('cour.index')->with('success', 'Cour created successfully');
    }

    public function edit($id)
    {
        $souscategories= Sujet::all();
        $Cour = Cour::find($id);
        return view('management.Cour.edit', compact('Cour','souscategories'));
    }
    // public function souscat($id)
    // {
    //     $listchildren = Cour::all();
    //     dd($listchildren->Cour);
    //     return view('management.listchildren', compact('listchildren'));
    // }

    public function update(Request $request, $id)
    {
        $Cour = Cour::find($id);
        $v = $request->validate([
            'SjName' => 'required|string|max:100',
            'id_SCat' => 'required|exists:sous_categories,id_SCat',
        ]);

        $Cour->update($v);
        return redirect()->route('Cour.index')->with('success', 'Cour updated successfully');
    }

    public function destroy($id)
    {
        Cour::find($id)->delete();
        return redirect()->route('cour.index')->with('success', 'Cour deleted successfully');
    }
}
