<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestQuestionController extends Controller
{
    public function create()
    {
        return view('management.testquestion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'commentable_id' => 'required',
            'commentable_type' => 'required|in:Post,Video',
        ]);

        Comment::create($request->all());

        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
