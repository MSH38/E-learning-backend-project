<?php

use App\Http\Controllers\Api\Category\CategoryController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Parent\ParentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('parents','App\Http\Controllers\Api\Parent\ParentController@parents');
//Route::get('getParent/{id}','App\Http\Controllers\Api\Parent\ParentController@parentByID');
//Route::post('newParent','App\Http\Controllers\Api\Parent\ParentController@create');
//Route::put('parent/{parent}','App\Http\Controllers\Api\Parent\ParentController@parentUpdate');
//Route::get('getParents','App\Http\Controllers\Api\Parent\ParentController@parents');
Route::resource('category', CategoryController::class);
