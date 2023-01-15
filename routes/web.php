<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/try',[PostController::class, 'index']);

Route::resource('posts','PostController');
Route::get('/create-post',[PostController::class, 'create']);
Route::get('/post/{post}',[PostController::class, 'show']);

Route::post('/store-post',[PostController::class, 'store']);




Route::post('/register-user',[UserController::class,'registerUser']);
Route::post('/register-form',[UserController::class,'registerForm']);
Route::post('/login',[UserController::class,'login']);
Route::post('/logout',[UserController::class,'logout']);

Route::get('/',[UserController::class,'showCorrectPage']);



Route::get('profile/{user:username}', [UserController::class, 'profile']);
