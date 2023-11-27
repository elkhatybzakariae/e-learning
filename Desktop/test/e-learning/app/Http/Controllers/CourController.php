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
        $admin = auth()->user()->roles->contains('role_name', 'moderateur');
        $id = Auth::id();
        if ($admin) {
            $cours = Cour::where('valider', '0')->orderBy('id_C', 'desc')->get();
            return view('management.cour.index', compact('cours'));
        } else {
            $cours = Cour::where('id_U', $id)->orderBy('id_C', 'desc')->get();
            return view('management.cour.index', compact('cours'));
        }
    }
    public function show($id)
    {
        $cour = Cour::where('id_C', $id)
        ->with([
            'section' => function ($query) {
                $query->with([
                    'session' => function ($query) {
                        $query->with(['video' => function ($query) {
                            $query->orderBy('created_at', 'asc');
                        }]);
                    },
                    'quiz',
                ]);
            },
            'sujet.souscategorie.categorie'
        ])
        ->first();
    

return view('management.cour.show', compact('cour'));



        //     $cour = Cour::where('id_C', $id)
        //         ->with(['section.session.video.media'])
        //         ->with(['section.quiz'])
        //         ->with(['sujet.souscategorie.categorie'])
        //         ->first();
        //     // dd($cour);
        //     return view('management.cour.show', compact('cour'));
    }
    public function coursvalider()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)
            ->where('valider', '1')
            ->orderBy('id_C', 'desc')
            ->get();
        return view('management.cour.index', compact('cours'));
    }
    public function coursnonvalider()
    {
        $id = Auth::id();
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
        // dd($request);
        $creator = Auth::id();
        $customIdC = Helpers::generateIdC();
        $validatedData = $request->validated();

        $sujet = Sujet::where('id_Sj', $validatedData['id_Sj'])->select('id_SCat', 'SjName')->first();;
        $subCategory =  SousCategorie::where('id_SCat', $sujet['id_SCat'])->select('id_Cat', 'SCatName')->first();;
        $category =  Categorie::where('id_Cat', $subCategory['id_Cat'])->value('CatName');
        $imgName = time() . $request->file('photo')->getClientOriginalName();

        $path = 'images/' . $category . '/' . $subCategory['SCatName'] . '/' . $sujet['SjName'];

        $photoPath = $request->file('photo')->storeAs($path, $imgName, 'public');

        $validatedData['photo'] = $photoPath;
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
        $validatedData = $request->validated();

        $sujet = Sujet::where('id_Sj', $validatedData['id_Sj'])->select('id_SCat', 'SjName')->first();;
        $subCategory =  SousCategorie::where('id_SCat', $sujet['id_SCat'])->select('id_Cat', 'SCatName')->first();;
        $category =  Categorie::where('id_Cat', $subCategory['id_Cat'])->value('CatName');

        $path = 'images/' . $category . '/' . $subCategory['SCatName'] . '/' . $sujet['SjName'];
        $imgName = time() . $request->file('photo')->getClientOriginalName();

        // $photoPath = $request->file('photo')->store($path);
        $photoPath = $request->file('photo')->storeAs($path, $imgName, 'public');

        // Get the URL or relative path to access the image
        // $validatedData['photo'] = $path;

        // $photoPath = $request->file('photo')->store('public/'.$path);
        $validatedData['photo'] = $photoPath;
        $Cour->update($validatedData);
        return redirect()->route('cour.index')->with('success', 'Cour updated successfully');
    }

    public function destroy($id)
    {
        Cour::find($id)->delete();
        return redirect()->route('cour.index')->with('success', 'Cour deleted successfully');
    }

    public function filterparcat($name)
    {
        $categorie = Categorie::all();
        $souscategorie = SousCategorie::all();
        $sujets = Sujet::all();
        $coursList = Cour::whereHas('sujet.souscategorie.categorie', function ($query) use ($name) {
            $query->where('CatName', $name);
        })->where('valider', 1)->with('user')->get();

        return response()->json($coursList);
        // return view('index', compact('coursList','categorie','souscategorie','sujets'));
    }
    public function filterparsouscat($name)
    {
        $categorie = Categorie::all();
        $souscategorie = SousCategorie::all();
        $sujets = Sujet::all();
        // $coursList = Cour::where('valider', 1)->get();
        $coursList = Cour::whereHas('sujet.souscategorie', function ($query) use ($name) {
            $query->where('SCatName', $name);
        })->where('valider', 1)->with('user')->get();

        return response()->json($coursList);
        // return view('index', compact('coursList','categorie','souscategorie','sujets'));
    }
    public function filterparsj($name)
    {
        $categorie = Categorie::all();
        $souscategorie = SousCategorie::all();
        $sujets = Sujet::all();
        // $coursList = Cour::where('valider', 1)->get();
        $coursList = Cour::whereHas('sujet', function ($query) use ($name) {
            $query->where('SjName', $name);
        })->where('valider', 1)->with('user')->get();
        // dd($coursList);
        // return view('index', compact('coursList','categorie','souscategorie','sujets'));
        // return Json('coursList','categorie','souscategorie','sujets');
        return response()->json($coursList);
    }


    public function search(Request $request)
    {
        $searchQuery = $request->input('searchInput');
        $searchResults = Cour::where('title', 'like', '%' . $searchQuery . '%')
            ->where('valider', 1)
            ->with('user', 'sujet.souscategorie.categorie')
            ->get();
        return response()->json($searchResults);
    }
}
