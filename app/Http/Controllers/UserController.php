<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    protected function show($id)
    {
        $user = User::find($id);
        $comments = $user->comments()->orderBy('id', 'desc')->get();
        return view('user', ['user' => $user, 'comments' => $comments]);
    }

    protected function destroy()
    {
        $user = Auth::user();
        $user->comments()->delete();
        $user->delete();
        Auth::logout();
        return redirect('/');
    }
}
