<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Cour;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $listid = WishList::where('id_U', $id)->get();
        $ids = $listid->pluck('id_C')->all();
        $listW = Cour::whereIn('id_C', $ids)->get();
        return view('management.wishlist.index', compact('listW'));
    }
    public function store(Request $request)
    {
        $id = Auth::id();
        $idW = Helpers::generateIdW();
        $idC = $request->input('id');
        $inwishlist = WishList::where('id_C', $idC)->where('id_U', $id)->first();
        if (!$inwishlist) {
            $response = WishList::create([
                'id' => $idW,
                'id_U' => $id,
                'id_C' => $idC,
            ]);
        }
        return response()->json($response);
    }
    public function delete(Request $request, $idC)
    {
        $id = Auth::id();
        $inwishlist = WishList::where('id_C', $idC)->where('id_U', $id)->first();
        if ($inwishlist) {
            $inwishlist->delete();
        }
        return redirect()->back();
    }
}
