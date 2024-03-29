<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\CourRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\Categorie;
use App\Models\Cour;
use App\Models\SousCategorie;
use App\Models\Sujet;
use App\Models\VideoTerminer;
use Illuminate\Http\Request;

class CourController extends Controller
{
    public function index()
    {
        $admin = auth()->user()->roles->contains('role_name', 'moderateur');
        $client = auth()->user()->roles->contains('role_name', 'client');
        $id = Auth::id();
        if ($admin) {
            $cours = Cour::where('valider', '0')->orderBy('id_C', 'desc')->get();
            return view('management.cour.index', compact('cours'));
        } elseif ($client) {
            $cours = Cour::whereHas('section.session.video.videoterminer', function ($query) {
                $query->where('id_U', Auth::id());
            })->with('section.session.video')->get();
            return view('management.cour.index', compact('cours'));
        } else {
            $cours = Cour::where('id_U', $id)->orderBy('id_C', 'desc')->get();
            return view('management.cour.index', compact('cours'));
        }
    }
    public function show($id)
    {
        $couur = new Cour();
        $cour = $couur->show($id);
        return view('management.cour.show', compact('cour'));
    }
    public function catshow($name)
    {
        $cours = Cour::whereHas('sujet.souscategorie.categorie', function ($query) use ($name) {
            $query->where('CatName', $name);
        })->paginate(5);
        return view('index', [
            'cours' => $cours,
        ]);
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

        $photoPath = $request->file('photo')->storeAs($path, $imgName, 'public');
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
        $coursList = Cour::whereHas('sujet.souscategorie.categorie', function ($query) use ($name) {
            $query->where('CatName', $name);
        })->where('valider', 1)->with('user')->get();

        return response()->json($coursList);
    }
    public function filterparsouscat($name)
    {
        $categorie = Categorie::all();
        $souscategorie = SousCategorie::all();
        $sujets = Sujet::all();
        $coursList = Cour::whereHas('sujet.souscategorie', function ($query) use ($name) {
            $query->where('SCatName', $name);
        })->where('valider', 1)->with('user')->get();

        return response()->json($coursList);
    }
    public function filterparsj($name)
    {
        $coursList = Cour::whereHas('sujet', function ($query) use ($name) {
            $query->where('SjName', $name);
        })->where('valider', 1)->with('user')->get();
        return response()->json($coursList);
    }


    public function search(Request $request)
    {
        $searchQuery = $request->input('searchInput');
        $cours = Cour::where('title', 'like', '%' . $searchQuery . '%')
            ->where('valider', 1)
            ->with('user', 'sujet.souscategorie.categorie')
            ->paginate(6);
        return view('index', [
            'cours' => $cours,
        ]);
    }
}
