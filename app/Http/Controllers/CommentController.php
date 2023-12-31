<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $comments = Comment::whereNull('target_id')->orderBy('id', 'desc')->get();
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
        $inputs=$this->validator($request);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->comment = $inputs['comment'];
        if ($request->target_id) {
            $comment->target_id = $request->target_id;
            $comment->save();
            $request->session()->regenerateToken();
            return redirect()->route('comment.show', ['id' => $request->target_id]);
        }
        $comment->save();
        $request->session()->regenerateToken();
        return redirect('/comments');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id, Comment $comment)
    {
        //
        $comment = Comment::find($id);
        $replies = Comment::whereTarget_id($id)->orderBy('id', 'desc')->get();
        return view('show', ['comment' => $comment, 'replies' => $replies]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id, Comment $comment)
    {
        //
        $comment = Comment::find($id);
        return view('edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, Comment $comment)
    {
        //
        $inputs=$this->validator($request);

        $comment = Comment::find($id);
        $comment->comment = $inputs['comment'];
        $comment->save();
        return redirect()->route('comment.show', ['id' => $comment->id]);
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

    protected function validator(Request $request)
    {
        return $request->validate([
            'comment' => 'required|max:255'
        ],
        [
            'comment.required' => 'コメントを入力してください。',
            'comment.max' => 'コメントは255文字以内にしてください。'
        ]);
    }
}
