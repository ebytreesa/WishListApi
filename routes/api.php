<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishController;

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
Route::get('wishes', [WishController::class,'index']);
Route::post('wishes', [WishController::class,'create']);
Route::put('wishes/{id}', [WishController::class,'update']);
Route::delete('wishes/{id}', [WishController::class,'destroy']);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
