<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AllPostController;

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


Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('user/logout', [LoginController::class, 'logout'])->name('logout')->middleware('logged');

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('signin', [UsuarioController::class, 'store'])->name('signin');

Route::resource('mypost', PostController::class);
Route::resource('mycomment', CommentController::class);

Route::get('post', [PostController::class, 'allposts'])->name('allposts');;

//Route::resource('post', AllPostController::class);

