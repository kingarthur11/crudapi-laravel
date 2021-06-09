<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getallauthor', [PostController::class,'index']);
Route::get('/getauthor/{id}', [PostController::class,'show']);
Route::post('/postauthor', [PostController::class,'store']);
Route::put('/updateauthor/{id}', [PostController::class,'update']);
Route::delete('/deleteauthor/{id}', [PostController::class,'destroy']);

Route::get('/getallauthorcomments', [CommentController::class,'index']);
Route::get('/getauthorcomment/{id}', [CommentController::class,'show']);
Route::post('/postauthorcomment', [CommentController::class,'store']);
Route::put('/updateauthorcomment/{id}', [CommentController::class,'update']);
Route::delete('/deleteauthorcomment/{id}', [CommentController::class,'destroy']);