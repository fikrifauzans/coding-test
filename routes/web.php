<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;

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

Route::get('/', [PostController::class, 'showAll'])->middleware('auth');
Route::get('/author', [UserController::class, 'show']);
Route::post('/author/create', [UserController::class, 'create']);
Route::post('/author/destroy', [UserController::class, 'destroy']);
Route::post('/author/update', [UserController::class, 'update']);
Route::get('/author/update/{user:id}', [UserController::class, 'updateForm']);
Route::get('/post', [PostController::class, 'show']);
Route::post('/post/create', [PostController::class, 'create']);
Route::post('/post/update', [PostController::class, 'updatePost']);
Route::get('/post/update/{post:id}', [PostController::class, 'showUpdate']);
Route::post('/post/delete', [PostController::class, 'destroy']);
Route::get('/login', [LoginController::class, 'loginView']);
Route::post('/login', [LoginController::class, 'login']);
