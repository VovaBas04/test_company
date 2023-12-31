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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::apiResource('/catalogs','CatalogController');
Route::get('/list',ListController::class);
Route::get('/tree',TreeController::class);
Route::get('/show',ShowController::class);
Route::get('/show/{id}',ShowPartController::class);
