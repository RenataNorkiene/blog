<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [BlogController::class, 'index']);
Route::get('/add-post', [BlogController::class, 'createPost']);
Route::post('/store', [BlogController::class, 'store']);
Route::get('/post/{post}', [BlogController::class, 'show']);
Route::get('/delete/{post}', [BlogController::class, 'destroy']);
Route::get('/update/{post}', [BlogController::class, 'update']);
Route::patch('/storeupdate/{post}', [BlogController::class, 'storeUpdate']);
Route::post('/post/{post}/comment', [CommentController::class, 'addComment']);


Auth::routes();
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
