<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MypostController;
use App\Http\Controllers\LikesController;


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




Route::get('home', function () {
    return view('Home');
});
Route::get('mypost', function () {
    return view('mypost');
});
Route::get('/Setting', function () {
    return view('Setting');
});
Route::get('/Message', function () {
    return view('Message');
});
Route::get('/SignUp', function () {
    return view('SignUp');
});

Route::get('/', function () {
    return view('Login');
});
Route::get('/Notif', 'App\Http\Controllers\PostController@getNotif')->name('Notif');
Route::get('/Notif', 'App\Http\Controllers\PostController@getNotif')->name('Notif');
Route::get('/Profile', 'App\Http\Controllers\ProfilController@index')->name('Profile');
Route::group(array('prefix' => 'Profile'), function (){
    Route::get('/all', 'App\Http\Controllers\ProfilController@all')->name('Profile.all');
    Route::post('/store', 'App\Http\Controllers\ProfilController@store')->name('Profile.store');
    Route::get('/edit/{LembagaPend}','App\Http\Controllers\ProfilController@edit')->name('Profile.edit');
});

Route::get('/Profile', function () {
    return view('Profile');
});
Route::get('/Upload', function () {
    return view('Upload');
});
Route::get('/EditPost', function(){
    return view('EditPost');
});
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'auth']);
Route::post('SignUp', [SignUpController::class, 'SignUp']);
Route::get('SignUp', [SignUpController::class,'showFormSignUp'])->name('SignUp');

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [HomeController::class, 'HomeU'])->name('home');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('home', [PostController::class, 'getHome']);
    Route::post('post.store', [PostController::class, 'store']);
    Route::get('post.create', [PostController::class, 'create']);
    Route::get('/DeletePost/{id}', [PostController::class, 'delete']);
    Route::get('/EditPost/{id}', [PostController::class, 'edit']);
    Route::put('/UpdatePost/{id}', [PostController::class, 'update']);
    // Route::get('like/{id}', [PostController::class, 'likes']);
    Route::post('/like', [PostController::class, 'likemanage']);
    Route::get('/Comment/{id}', [PostController::class, 'comment']);
    Route::post('/addcomment', [PostController::class, 'addcomment']);
    Route::get('/DeletePost/{id}', [MypostController::class, 'delete']);
    Route::get('/EditPost/{id}', [MypostController::class, 'edit']);
    Route::put('/UpdatePost/{id}', [MypostController::class, 'update']);
    Route::get('mypost', [MypostController::class, 'index']);
});


Route::get('/profile', 'App\Http\Controllers\UserController@profile');
Route::post('/profile', 'App\Http\Controllers\UserController@update_avatar');

Route::prefix('/profile')->group(function () {
    Route::put('/update', [UserController::class, 'update'])->name('profile.update');
});
Route::get('/editProfile', 'App\Http\Controllers\UserController@edit');
