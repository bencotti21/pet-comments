<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/comments', [CommentController::class, 'index'])->name('comment.list');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::get('/comment/{id}',[CommentController::class, 'show'])->name('comment.show');
Route::delete('comment/{id}',[CommentController::class, 'destroy'])->name('comment.delete');

