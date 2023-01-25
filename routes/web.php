<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;

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
Route::delete('/post/{post}', [PostController::class, 'delete']);
Route::get('/post/{post}/edit', [PostController::class, 'showEditForm']);
Route::put('/post/{post}', [PostController::class, 'update']);


Route::post('/store-post',[PostController::class, 'store']);


Route::match(['get','post'],'/register-user',[UserController::class,'registerUser']);
Route::match(['get','post'],'/register-form',[UserController::class,'registerForm']);
// Route::post('/register-user',[UserController::class,'registerUser']);
// Route::post('/register-form',[UserController::class,'registerForm']);
Route::post('/login',[UserController::class,'login']);
Route::post('/logout',[UserController::class,'logout']);

Route::get('/',[UserController::class,'showCorrectPage']);

Route::match(['get','post'],'/update-profile/{user:username}',[UserController::class,'updateProfile']);

Route::get('profile/{user:username}', [UserController::class, 'profile']);
Route::get('/manage-avatar', [UserController::class, 'showAvatarForm']);
Route::post('/manage-avatar', [UserController::class, 'storeAvatar']);
Route::get('profile/{user:username}/followed', [UserController::class, 'postFollowing']);

Route::get('/edit-profile/{user:username}', [UserController::class, 'showEditProfileForm']);
Route::get('/change-password/{user:username}', [UserController::class, 'changePassword']);
Route::post('/update-password/{user:username}', [UserController::class, 'updatePassword']);
Route::get('/deleted-profile/{user:username}', [UserController::class, 'showDeleteForm']);
Route::post('/delete/{user:username}', [UserController::class, 'deleteProfile']);


//follow related routes
Route::post('/create-follow/{post}', [FollowController::class, 'createFollow']);
Route::post('/remove-follow/{post}', [FollowController::class, 'removeFollow']);


//search
Route::get('/search/{term}', [PostController::class, 'search']);
