<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        $categories= Categorie::all();
        // return view('welcome');
        return view('index2Copy',compact('categories'));
    }
    
}
