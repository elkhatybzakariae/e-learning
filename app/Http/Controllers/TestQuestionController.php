<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\TestQuestionRequest;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Reponse;
use Illuminate\Http\Request;

class TestQuestionController extends Controller
{
    public function index($id)
    {
        $questions = Question::where('questable_id', $id)->get();
        return view('management.testquestion.index', compact('questions', 'id'));
    }
    public function create($id)
    {
        return view('management.testquestion.create', compact('id'));
    }

    public function store(TestQuestionRequest $request, $id)
    {

        $customIdQues = Helpers::generateIdQues();
        $validatedData = $request->validated();
        $validatedData['id_Que'] = $customIdQues;

        $validatedData['questable_id'] = $id;
        $inquiz = Quiz::where('id_Q', $id)->exists();
        if ($inquiz) {
            $validatedData['questable_type'] = 'App\Models\Quiz';
        } else {
            $validatedData['questable_type'] = 'App\Models\Certificate';
        }

        Question::create($validatedData);

        foreach ($validatedData['responses'] as $response) {
            Reponse::create([
                'id_R' => Helpers::generateIdQR(),
                'reponse' => $response['response_text'],
                'statusrep' => $response['is_true'],
                'id_Que' => $customIdQues,
            ]);
        }
        $url = url()->previous();
        // dd($url);
        return redirect()->to(url()->previous())->with('success', 'Question added successfully');

        // return redirect()->route('sujet.index')->with('success', 'Sujet created successfully');

        // return redirect()->back()->with('success', 'Question added successfully');
    }
    public function destroy($id)
    {
        Question::find($id)->delete();
        return redirect()->to(url()->previous())->with('success', 'Question deleted successfully');
    }
}
