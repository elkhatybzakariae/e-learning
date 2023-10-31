<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\MediaRequest;
use App\Models\Cour;
use App\Models\Media;
use App\Models\Section;
use App\Models\Session;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
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
        $idsV = $videos->pluck('id_V')->all();

        $media = Media::whereIn('id_V', $idsV)->get();


        return view('management.media.index', compact('media'));
    }

    public function create()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        return view('management.media.create', compact('cours'));
    }

    public function store(MediaRequest $request)
    {
        $customIdM = Helpers::generateIdM();
        $validatedData = $request->validated();
        $validatedData['id_V'] = $customIdM;
        $url=$validatedData['lien'];
        $url1=explode('?v=', $url);
        $lien=explode('&', $url1[1]);
        $validatedData['lien']=$lien[0];
        Video::create($validatedData);
        return redirect()->route('video.index')->with('success', 'video created successfully');
    }

    
    public function edit($idV)
    {
        $id=Auth::id();
        $video = Video::find($idV);
        if(!$video){
            return view('404');
        }
        return view('management.video.edit', compact('video'));
    }

    public function update(VideoRequest $request, $idV)
    {
        $video = Video::find($idV);
        if (!$video) {
            return redirect()->route('video.index')->with('error', 'video not found');
        }
        $video->update($request->validated());
        return redirect()->route('video.index')->with('success', 'video updated successfully');
    }

    public function destroy($idV)
    {
        Section::find($idV)->delete();
        return redirect()->route('section.index')->with('success', 'Cour deleted successfully');
    }
}
