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
        // dd($request->hasFile('path'));
        // dd($request);
        // $request->validate([
        //     'mediaName' => 'required|string|max:100',
        //     'path' => 'required', 
        //     'id_V' => 'required|exists:Videos,id_V',
        // ]);
        $customIdM = Helpers::generateIdM();
        $validatedData = $request->validated();
        $file = $request->file('path');
        $path = $file->store('uploads', 'public');
        // dd($path);
        $validatedData['id_M'] = $customIdM;
        $validatedData['path'] = $path;
        
        // $validatedData['lien']=$lien[0];
        Media::create($validatedData);
        return redirect()->route('media.index')->with('success', 'media created successfully');
    }

    
    public function edit($idV)
    {
        $media = Media::find($idV);
        if(!$media){
            return view('404');
        }
        return view('management.media.edit', compact('media'));
    }

    public function update(MediaRequest $request, $idV)
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
