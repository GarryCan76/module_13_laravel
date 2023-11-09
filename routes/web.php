<?php

use Illuminate\Support\Facades\Route;
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
    $posts = [];
    if (auth()->check()){
        $posts = auth()->user()->usersPosts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);

});
Route::post('/register', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//blog post
route::post('/create-post', [\App\Http\Controllers\PostController::class, 'createPost']);
route::get('/edit-post/{post}', [\App\Http\Controllers\PostController::class, 'showEditScreen']);
route::put('/edit-post/{post}', [\App\Http\Controllers\PostController::class, 'updatePost']);
route::delete('/delete-post/{post}', [\App\Http\Controllers\PostController::class, 'deletePost']);

