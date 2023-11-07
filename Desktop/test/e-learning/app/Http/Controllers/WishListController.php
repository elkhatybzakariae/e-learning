<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index(){
        $id=Auth::id();
        $listid= WishList::where('id_U',$id)->get();
        $ids = $listid->pluck('id_C')->all();
        $listW = Cour::whereIn('id_C', $ids)->get();
        return view('management.wishlist.index',compact('listW'));
    }
}
