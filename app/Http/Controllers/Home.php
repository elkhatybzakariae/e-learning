<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        // $categories= Categorie::all();
        // return view('index2Copy',compact('categories'));
        $lastC = Cour::orderBy('created_at', 'desc')->take(10)->get();
        return view('welcome', compact('lastC'));
    }
}
