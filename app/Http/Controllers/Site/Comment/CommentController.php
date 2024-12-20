<?php

namespace App\Http\Controllers\Site\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Comment\CommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  \App\Http\Requests\Site\Comment\CommentRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        Comment::create($data);
        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
