<?php

use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MypostController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'authenticating']);
Route::get('logout', [LoginController::class, 'userlogout']);
Route::post('SignUp', [SignUpController::class, 'signupapi']);
Route::post('upload', [PostController::class, 'upload']);
Route::get('destroy', [MypostController::class, 'destroy']);
Route::post('cmnt', [PostController::class, 'cmnt']);

