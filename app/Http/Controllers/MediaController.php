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
use Illuminate\Support\Facades\Storage;

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
        $file = $request->file('path');
        $path = $file->store('uploads', 'public');
        $validatedData['id_M'] = $customIdM;
        $validatedData['path'] = $path;
        Media::create($validatedData);
        return redirect()->route('media.index')->with('success', 'media created successfully');
    }


    public function edit($idM)
    {
        $media = Media::find($idM);
        if (!$media) {
            return view('404');
        }
        return view('management.media.edit', compact('media'));
    }

    public function update(MediaRequest $request, $idM)
    {
        $media = Media::find($idM);
        if (!$media) {
            return redirect()->route('media.index')->with('error', 'media not found');
        }

        Storage::delete($media->path);
        $file = $request->file('path');
        dd($file);
        $path = $file->store('uploads', 'public');
        $media->update($request->validated());
        return redirect()->route('media.index')->with('success', 'media updated successfully');
    }

    public function destroy($idM)
    {
        Media::find($idM)->delete();
        return redirect()->route('media.index')->with('success', 'media deleted successfully');
    }


    public function downloadFile($id)
    {
        $media = Media::findOrFail($id);

        $filePath = storage_path('app/public/' . $media->path);
        if (file_exists($filePath)) {
            $originalFileName = pathinfo($media->path, PATHINFO_FILENAME);

            $sanitizedFileName = str_replace(['/', '\\'], '_', $originalFileName);

            $headers = [
                'Content-Type' => 'application/octet-stream',
                'Content-Disposition' => 'attachment; filename="' . $sanitizedFileName . '"',
            ];

            return response()->download($filePath, $sanitizedFileName, $headers);
        } else {
            return response()->json(['message' => 'File not found.'], 404);
        }
    }
}
