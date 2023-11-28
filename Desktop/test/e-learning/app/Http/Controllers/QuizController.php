<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\QuizRequest;
use App\Models\Cour;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Reponse;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)
            ->with(['section.quiz'])
            ->get();
        $idsC = $cours->pluck('id_C')->all();
        $section = Section::whereIn('id_C', $idsC)->get();
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
    public function passer($id)
    {
        $quiz = Quiz::where('id_Q', $id)->with('questions.reponse')->get();

        // dd($quiz);
        return view('management.quiz.passerquiz', compact('quiz'));
    }
    public function valider(Request $request)
    {
        $data = $request->formData;
        $idQ = $request->input('idQ');

        $ans = explode('&', $data);

        $tab = [];
        foreach ($ans as $item) {
            list($key, $value) = explode('=', $item);
            array_push($tab, $value);
        }

        $results = Reponse::whereIn('id_R', $tab)->get();

        $score = 0;
        foreach ($results as $correctAnswer) {
            if (isset($correctAnswer) && $correctAnswer->statusrep === 1) {
                $score++;
            }
        }
        $Q = Question::where('questable_id', $idQ)->get();

        $ids = $Q->pluck('id_Que')->all();
        $listR = Reponse::whereIn('id_Que', $ids)->get();

        // $RCount = count($tab);
        $nbQue = Question::where('questable_id', $idQ)->count();
        $sc = ($score / $nbQue) * 100;

        return response()->json([
            'results' => $results,
            'score' => $sc,
            'RCount' => $score,
            'nbQue' => $nbQue,
            'listR' => $listR
        ]);
    }
}
