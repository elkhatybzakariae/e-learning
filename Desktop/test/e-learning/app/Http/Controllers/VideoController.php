<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Cour;
use App\Models\Section;
use App\Models\Session;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index($id)
    {
        $cours = Cour::where('id_U', $id)->get();
        $idsC = $cours->pluck('id_C')->all();

        $sections = Section::whereIn('id_C', $idsC)->get();
        $idsSec = $sections->pluck('id_Sec')->all();

        $sessions = Session::whereIn('id_Sec', $idsSec)->get();
        $idsSess = $sessions->pluck('id_Sess')->all();

        $videos = Video::whereIn('id_Sess', $idsSess)->get();
        return view('management.video.index', compact('videos', 'id'));
    }

    public function create()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        return view('management.video.create', compact('cours'));
    }

    public function store(VideoRequest $request)
    {
        $id = Auth::id();
        $validatedData = $request->validated();
        Video::create($validatedData);
        return redirect()->route('video.index', compact('id'))->with('success', 'video created successfully');
    }

    public function show($idV)
    {
        $id=Auth::id();
        $video = Video::find($idV);
        return view('management.video.show', compact('video', 'id'));
    }
    public function edit($idSess)
    {
        $id=Auth::id();
        $session = Session::find($idSess);
        return view('management.session.edit', compact('session', 'id'));
    }

    public function update(VideoRequest $request, $idSec)
    {
        $id=Auth::id();
        $session = Session::find($idSec);
        if (!$session) {
            return redirect()->route('session.index')->with('error', 'session not found');
        }
        $session->update($request->validated());
        return redirect()->route('session.index', compact('id'))->with('success', 'session updated successfully');
    }

    public function destroy($idSec)
    {
        $id = Auth::id();
        Section::find($idSec)->delete();
        return redirect()->route('section.index', compact('id'))->with('success', 'Cour deleted successfully');
    }
}
