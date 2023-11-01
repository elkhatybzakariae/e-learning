<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\QuizRequest;
use App\Models\Cour;
use App\Models\Quiz;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        $idsC = $cours->pluck('id_C')->all();
        $section = Section::where('id_C', $idsC)->get();
        $idsS = $section->pluck('id_Sec')->all();
        $quiz = Quiz::whereIn('id_Sec', $idsS)->get();
        return view('management.quiz.index', compact('quiz'));
    }
    
    public function create()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        return view('management.quiz.create', compact('cours'));
    }

    public function store(QuizRequest $request)
    {

        $customIdQ = Helpers::generateIdQ();
        $validatedData = $request->validated();

        $validatedData['id_Q'] = $customIdQ;

        Quiz::create($validatedData);
        return redirect()->route('quiz.index')->with('success', 'quiz created successfully');
    }


    public function destroy($id)
    {
        Quiz::find($id)->delete();
        return redirect()->route('quiz.index')->with('success', 'quiz deleted successfully');
    }
}
