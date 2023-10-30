<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Cour;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    public function index($id)
    {
        $cours = Cour::where('id_U', $id)->get();
        $idsC = $cours->pluck('id_C')->all();

        $sections = Section::whereIn('id_C', $idsC)->get();
        return view('management.section.index', compact('sections', 'id'));
    }

    public function create()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        return view('management.section.create', compact('cours'));
    }

    public function store(SectionRequest $request)
    {
        $id = Auth::id();
        $validatedData = $request->validated();
        // $validatedData['id_C'] = $id;
        Section::create($validatedData);
        return redirect()->route('section.index', compact('id'))->with('success', 'section created successfully');
    }

    public function edit($idSec)
    {
        $id=Auth::id();
        $section = Section::find($idSec);
        return view('management.section.edit', compact('section', 'id'));
    }

    public function update(SectionRequest $request, $idSec)
    {
        $id=Auth::id();
        $section = Section::find($idSec);
        if (!$section) {
            return redirect()->route('section.index')->with('error', 'section not found');
        }
        $section->update($request->validated());
        return redirect()->route('section.index', compact('id'))->with('success', 'section updated successfully');
    }

    public function destroy($idSec)
    {
        $id = Auth::id();
        Section::find($idSec)->delete();
        return redirect()->route('section.index', compact('id'))->with('success', 'Cour deleted successfully');
    }
}
