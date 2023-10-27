<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index($id)
    {
        $sections = Section::where('id_C', $id)->get();
        return view('management.section.index', compact('sections','id'));
    }
    
    public function create($id)
    {
        return view('management.section.create', compact('id'));
    }

    public function store(SectionRequest $request,$id)
    {
        $validatedData = $request->validated();
        $validatedData['id_C'] = $id;
        Section::create($validatedData);
        return redirect()->route('section.index', compact('id'))->with('success', 'section created successfully');
    }

    public function edit($idSec,$id)
    {
        $section = Section::find($idSec);
        return view('management.section.edit', compact('section','id'));
    }
    
    public function update(SectionRequest $request, $idSec,$id)
    {
        $section = Section::find($idSec);
        if (!$section) {
            return redirect()->route('section.index')->with('error', 'section not found');
        }
        $section->update($request->validated());
        return redirect()->route('section.index', compact('id'))->with('success', 'section updated successfully');
    }

    public function destroy($idSec,$id)
    {
        Section::find($idSec)->delete();
        return redirect()->route('section.index', compact('id'))->with('success', 'Cour deleted successfully');
    }
}
