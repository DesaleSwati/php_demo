<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// returns the home page with all posts
Route::get('/postlist', PostController::class .'@index')->name('posts.index');

Route::get('/posts/create', PostController::class . '@create')->name('posts.create');

Route::post('/posts', PostController::class .'@store')->name('posts.store');

Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');

// updates a post
Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update');

// deletes a post
Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');

