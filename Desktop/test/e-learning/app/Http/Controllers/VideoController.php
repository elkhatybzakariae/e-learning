<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\VideoRequest;
use App\Models\Cour;
use App\Models\Section;
use App\Models\Session;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        $idsC = $cours->pluck('id_C')->all();

        $sections = Section::whereIn('id_C', $idsC)->get();
        $idsSec = $sections->pluck('id_Sec')->all();

        $sessions = Session::whereIn('id_Sec', $idsSec)->get();
        $idsSess = $sessions->pluck('id_Sess')->all();

        $videos = Video::whereIn('id_Sess', $idsSess)->get();
        return view('management.video.index', compact('videos'));
    }

    public function create()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        return view('management.video.create', compact('cours'));
    }

    public function store(VideoRequest $request)
    {
        $customIdV = Helpers::generateIdv();
        $validatedData = $request->validated();
        $validatedData['id_V'] = $customIdV;
        $url=$validatedData['lien'];
        $url1=explode('?v=', $url);
        $lien=explode('&', $url1[1]);
        $validatedData['lien']=$lien[0];
        Video::create($validatedData);
        return redirect()->route('video.index')->with('success', 'video created successfully');
    }

    public function show($idV)
    {
        $video = Video::find($idV);
        if(!$video){
            return view('404');
        }
        return view('management.video.show', compact('video'));
    }
    public function edit($idV)
    {
        $id=Auth::id();
        $video = Video::find($idV);
        if(!$video){
            return view('404');
        }
        $url='https://www.youtube.com/watch?v=';
        return view('management.video.edit', compact('video','url'));
    }

    public function update(VideoRequest $request, $idV)
    {
        $video = Video::find($idV);
        if (!$video) {
            return redirect()->route('video.index')->with('error', 'Video not found');
        }

        $validatedData = $request->validated();

        $url = $validatedData['lien'];
        $url1 = explode('?v=', $url);
        $lien = explode('&', $url1[1]);
        $videoId = $lien[0];
        $validatedData['lien'] = $videoId;

        $video->update($validatedData);

        return redirect()->route('video.index')->with('success', 'Video updated successfully');
    
    }

    public function destroy($idV)
    {
        Video::find($idV)->delete();
        return redirect()->route('video.index')->with('success', 'video deleted successfully');
    }
}
