<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/movies',[\App\Http\Controllers\MovieApiController::class,'index']);
Route::post('/movies',[\App\Http\Controllers\MovieApiController::class,'store']);
Route::put('/movies/{movie}',[\App\Http\Controllers\MovieApiController::class,'update']);
Route::delete('/movies/{movie}',[\App\Http\Controllers\MovieApiController::class,'destroy']);


