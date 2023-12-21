<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\SectionRequest;
use App\Models\Cour;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    public function index()
    {
        $id=Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        $idsC = $cours->pluck('id_C')->all();

        $sections = Section::whereIn('id_C', $idsC)->get();
        return view('management.section.index', compact('sections'));
    }

    public function create()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        return view('management.section.create', compact('cours'));
    }

    public function store(SectionRequest $request)
    {
        $customIdSec = Helpers::generateIdSec();
        $validatedData = $request->validated();

        $validatedData['id_Sec'] = $customIdSec;
        Section::create($validatedData);
        return redirect()->route('section.index')->with('success', 'section created successfully');
    }

    public function edit($idSec)
    {
        $section = Section::find($idSec);
        if (!$section) {
            return view('404');
        }
        return view('management.section.edit', compact('section'));
    }

    public function update(SectionRequest $request, $idSec)
    {
        $section = Section::find($idSec);
        if (!$section) {
            return redirect()->route('section.index')->with('error', 'section not found');
        }
        $section->update($request->validated());
        return redirect()->route('section.index')->with('success', 'section updated successfully');
    }

    public function destroy($idSec)
    {
        Section::find($idSec)->delete();
        return redirect()->route('section.index')->with('success', 'Cour deleted successfully');
    }
}
