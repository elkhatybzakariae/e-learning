<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\SessionRequest;
use App\Models\Cour;
use App\Models\Section;
use App\Models\Session;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        $idsC = $cours->pluck('id_C')->all();

        $sections = Section::whereIn('id_C', $idsC)->get();
        $idsSec = $sections->pluck('id_Sec')->all();

        $sessions = Session::whereIn('id_Sec', $idsSec)->get();
        return view('management.session.index', compact('sessions'));
    }

    public function create()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        return view('management.session.create', compact('cours'));
    }

    public function store(SessionRequest $request)
    {
        $customIdSess = Helpers::generateIdSess();
        $validatedData = $request->validated();
        $validatedData['id_Sess'] = $customIdSess;
        Session::create($validatedData);
        return redirect()->route('session.index')->with('success', 'session created successfully');
    }

    public function edit($idSess)
    {
        $session = Session::find($idSess);
        if (!$session) {
            return view('404');
        }
        return view('management.session.edit', compact('session'));
    }

    public function update(SessionRequest $request, $idSec)
    {
        $session = Session::find($idSec);
        if (!$session) {
            return redirect()->route('session.index')->with('error', 'session not found');
        }
        $session->update($request->validated());
        return redirect()->route('session.index')->with('success', 'session updated successfully');
    }

    public function destroy($idSec)
    {
        Section::find($idSec)->delete();
        return redirect()->route('section.index')->with('success', 'Cour deleted successfully');
    }
}
