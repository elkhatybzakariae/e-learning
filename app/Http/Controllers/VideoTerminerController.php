<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Cour;
use App\Models\VideoTerminer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoTerminerController extends Controller
{
    function check(Request $request)
    {
        $id_VT = Helpers::generateIdVT();
        $id_U = Auth::id();
        $id_V = $request->input('id');

        $inVideoTerminer = VideoTerminer::where('id_V', $id_V)->where('id_U', $id_U)->first();
        if (!$inVideoTerminer) {
            $response = VideoTerminer::create([
                'id_VT' => $id_VT,
                'terminer' => '1',
                'id_U' => $id_U,
                'id_V' => $id_V,
            ]);

            return response()->json($response);
        }
    }
    function delete(Request $request)
    {
        $id_U = Auth::id();
        $id_V = $request->input('id');
        $inVideoTerminer = VideoTerminer::where('id_V', $id_V)->where('id_U', $id_U)->first();
        if ($inVideoTerminer) {
            $inVideoTerminer->delete();
            return response()->json(['message' => 'deleted']);
        } else {

            return response()->json(['message' => 'not found']);
        }
    }

    function progress(Request $request){        
        $id = $request->input('id');
        $couur= new Cour();
        $cour=$couur->show($id);
        if ($cour) {
            $videoCount = 0;
            foreach ($cour->section as $section) {
                foreach ($section->session as $session) {
                    $videoCount += $session->video->count();
                }
            }
        }

        if ($cour) {
            $videoTerminerCount = 0;
            foreach ($cour->section as $section) {
                foreach ($section->session as $session) {
                    foreach ($session->video as $video) {
                        foreach ($video->videoterminer  as $videoterminer) {
                            if ($videoterminer->terminer === 1) {
                                $videoTerminerCount++;
                            }
                        }
                    }
                }
            }
        }
        return response()->json(['videoCount'=>$videoCount,'videoTerminerCount'=>$videoTerminerCount]);
    }
}
