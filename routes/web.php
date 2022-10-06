<?php

use Illuminate\Support\Facades\Route;

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

// /  welcome.blade
Route::get('/',[App\Http\Controllers\PostController::class,'index'])->name('welcome');

Auth::routes();


// /home home.blade
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// /home/show-post-form  home.showPostForm.blade - prikazuje formu posle klika sa /home page
Route::get('/home/show-post-form',[App\Http\Controllers\HomeController::class,'showPostForm'])->name('home.showPostForm');
//  /home/all-users  home.showAllUsers.blade - prikazuje sve usere
Route::get('/home/all-users',[App\Http\Controllers\HomeController::class,'showAllUsers'])->name('home.showAllUsers');
// /home/single-user  home.showSingleUser.blade - prikazuje odabranog korisnika posle klika sa /home/all-users
Route::get('/home/single-user/{id}',[App\Http\Controllers\HomeController::class,'showSingleUser'])->name('home.showSingleUser');
// /home/single-post  home.showSinglePost.blade - prikazuje samo jedan post u okviru home
Route::get('/home/single-post/{id}',[App\Http\Controllers\HomeController::class,'showSinglePost'])->name('home.singlePost');

// /single-post  showSinglePost.blade - prikazuje samo jedan post u okviru views
Route::get('/single-post/{id}',[App\Http\Controllers\PostController::class,'showSinglePost'])->name('singlePost');

// /
Route::get('/single-post/show-comment-form/{id}',[App\Http\Controllers\CommentController::class,'showCommentForm'])->name('showCommentForm');
// /
Route::get('/single-post/show-comments/{id}',[App\Http\Controllers\CommentController::class,'showAllComments'])->name('showComments');

// /home/save-post  home.savePost  - metoda salje podatke u bazu sa /home/show-post-form
Route::post('/home/save-post',[App\Http\Controllers\HomeController::class,'savePost'])->name('home.savePost');
//
Route::post('/save-comment/{id}',[App\Http\Controllers\CommentController::class,'saveComment'])->name('saveComment');
