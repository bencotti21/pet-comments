<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

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
Route::post('/comment', [CommentController::class, 'store'])->middleware('auth')->name('comment.store');
Route::get('/comment/edit/{id}', [CommentController::class, 'edit'])->middleware('auth')->name('comment.edit');
Route::put('/comment/update/{id}', [CommentController::class, 'update'])->middleware('auth')->name('comment.update');
Route::get('/comment/{id}',[CommentController::class, 'show'])->name('comment.show');
Route::delete('comment/{id}',[CommentController::class, 'destroy'])->middleware('auth')->name('comment.delete');

Route::delete('/user',[UserController::class, 'destroy'])->name('user.delete');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
