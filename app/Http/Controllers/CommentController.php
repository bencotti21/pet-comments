<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $comments = Comment::all();
        return view('list', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $comment = new Comment();
        // $comment->user_id = $request->user_id;
        $comment->user_id = 0;  //動作確認用
        $comment->comment = $request->comment;
        $comment->save();
        return redirect('/comments');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id, Comment $comment)
    {
        //
        $comment = Comment::find($id);
        return view('show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id, Comment $comment)
    {
        //
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('/comments');
    }
}
