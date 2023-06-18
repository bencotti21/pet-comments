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
        $this->middleware('auth');
    }

    protected function destroy()
    {
        Comment::whereUser_id(Auth::id())->delete();
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        return redirect('/');
    }
}
