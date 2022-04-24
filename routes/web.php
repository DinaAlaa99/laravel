<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->Middleware(['auth']);
Route::get('/posts/create/', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware(['auth']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware(['auth']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware(['auth']);
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware(['auth']);
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy')->middleware(['auth']);
Route::post('/posts/{post}/comments',[CommentController::class,'store'])->name('comments.store')->middleware(['auth']);
Route::get('/posts/{post}/comments/{comment}', [CommentController::class, 'edit'])->name('comments.edit')->middleware(['auth']);
Route::put('/posts/{post}/comments/{comment}', [CommentController::class, 'update'])->name('comments.update')->middleware(['auth']);
Route::delete('/posts/{post}/comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy')->middleware(['auth']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
