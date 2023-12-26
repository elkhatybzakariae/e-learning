<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\QuizRequest;
use App\Models\Cour;
use App\Models\QRPasser;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizPasser;
use App\Models\Reponse;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $formateur = auth()->user()->roles->contains('role_name', 'formateur');
        $client = auth()->user()->roles->contains('role_name', 'client');
        $id = Auth::id();
        if ($formateur) {
            $cours = Cour::where('id_U', $id)
                ->with(['section.quiz'])
                ->get();
            $idsC = $cours->pluck('id_C')->all();
            $section = Section::whereIn('id_C', $idsC)->get();
            $idsS = $section->pluck('id_Sec')->all();

            $quiz = Quiz::whereIn('id_Sec', $idsS)->get();
            return view('management.quiz.index', compact('quiz'));
        } elseif ($client) {
            $quiz= QuizPasser::where('id_U',$id)->with(['quiz'])->get();
            // dd($quiz);
            return view('management.quiz.index', compact('quiz'));
        }
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
        $idU = Auth::id();
        $quiz = Quiz::where('id_Q', $id)->with(['questions.reponse', 'quizpasser.qrpasser'])->first();
        $DejaPasser = QuizPasser::where('id_Q', $quiz->id_Q)->where('id_U', $idU)->first();


        // $Q = Question::where('questable_id',$quiz->id_Q)->get();

        // $ids = $Q->pluck('id_Que')->all();

        $nbQue = Question::where('questable_id', $quiz->id_Q)->count();
        if ($DejaPasser) {
        $oldRep = QRPasser::where('id_QP', $DejaPasser->id_QP)->first();
        }
        if ($oldRep) {
            $QandR = explode('&', $oldRep->QRdata);

            $tab = [];
            foreach ($QandR as $item) {
                list($key, $value) = explode('=', $item);
                // array_push($tab, $value);
                $tab[$key] = $value;
            }
            // dd($tab);
            return view('management.quiz.passerquiz', compact('quiz', 'tab', 'DejaPasser', 'nbQue'));
            // }
        } else {
            return view('management.quiz.passerquiz', compact('quiz'));
        }
    }
    public function valider(Request $request)
    {
        $data = $request->formData;
        $idQ = $request->input('idQ');
        $idU = Auth::id();

        $ans = explode('&', $data);

        $tab = [];
        foreach ($ans as $item) {
            list($key, $value) = explode('=', $item);
            array_push($tab, $value);
        }

        $results = Reponse::whereIn('id_R', $tab)->get();

        $RepCount = 0;
        foreach ($results as $correctAnswer) {
            if (isset($correctAnswer) && $correctAnswer->statusrep === 1) {
                $RepCount++;
            }
        }
        $Q = Question::where('questable_id', $idQ)->get();

        $ids = $Q->pluck('id_Que')->all();
        $listR = Reponse::whereIn('id_Que', $ids)->get();

        $nbQue = Question::where('questable_id', $idQ)->count();
        $score = ($RepCount / $nbQue) * 100;

        $idQP = Helpers::generateIdQP();
        $idQRP = Helpers::generateIdQRP();

        $DejaPasser = QuizPasser::where('id_Q', $idQ)->where('id_U', $idU)->first();
        if (!$DejaPasser) {
            $QP = QuizPasser::create([
                'id_QP' => $idQP,
                'passer' => true,
                'repcount' => $RepCount,
                'score' => $score,
                'id_U' => $idU,
                'id_Q' => $idQ
            ]);
            QRPasser::create([
                'id_QRP' => $idQRP,
                'QRdata' => $data,
                'id_QP' => $QP->id_QP
            ]);
        } else {
            $DejaPasser->update([
                'repcount' => $RepCount,
                'score' => $score
            ]);
            $updateQRPasser = QRPasser::where('id_QP', $DejaPasser->id_QP)->first();
            $updateQRPasser->update([
                'QRdata' => $data,
            ]);
        }
        return response()->json([
            'results' => $results,
            'RepCount' => $RepCount,
            'score' => $score,
            'nbQue' => $nbQue,
            'listR' => $listR
        ]);
    }
}
