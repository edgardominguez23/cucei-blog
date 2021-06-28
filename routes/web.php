<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\ApiWebController;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\PostCommentController;

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
Route::resource('dashboard/post', PostController::class);
Route::post('dashboard/post/{post}/image', [PostController::class,'image'])->name('post.image');
Route::resource('dashboard/category', CategoryController::class);
Route::resource('dashboard/user', UserController::class);

Route::resource('dashboard/contact', ContactController::class)->only([
    'index','show','destroy',
]);
Route::resource('dashboard/post-comment', PostCommentController::class)->only([
    'index','show','destroy',
]);

Route::get('dashboard/post-comment/{post}/post',[PostCommentController::class,'post'])->name('post-comment.post');
Route::post('dashboard/post-comment/process/{postComment}',[PostCommentController::class,'process']);

Route::get('/home', [ApiWebController::class,'index'])->name('index');
Route::get('/home/detail/{id}', [ApiWebController::class,'detail']);
Route::get('/home/post-category/{id}', [ApiWebController::class,'post_category']);
Route::get('/home/contact', [ApiWebController::class,'contact']);
Route::get('/home/categories', [ApiWebController::class,'categories']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
