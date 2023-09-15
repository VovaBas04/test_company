<?php

use App\Models\Catalog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    $categories = Catalog::with("catalogs")->get();
    $arr = collect([]);
    foreach ($categories as $category){
        $arr->push($category->catalogs);
    }
    return view('welcome');
});
//Route::post('/result',[PostController::class,'show']);
//Route::match(['get', 'post'], '/result', [PostController::class, 'show']);
/* for api
*/
//Route::resource('/api/v1/tasks','App\Http\Controllers\TaskController');//не юзаем
