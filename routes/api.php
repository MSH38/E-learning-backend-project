<?php

use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Category\SubCategoryController;
use App\Http\Controllers\Api\Course\CourseController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Parent\ParentController;
use App\Http\Controllers\Api\admins\AdminsController;
use App\Http\Controllers\Api\admins\AccountsController;
use App\Http\Controllers\Api\admins\InstructorsController;
use App\Http\Controllers\Api\admins\InstructorsSupportController;
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

require __DIR__.'/CategoryApi.php';
// <<<<<<< HEAD
//Route::get('parents','App\Http\Controllers\Api\Parent\ParentController@parents');
//Route::get('getParent/{id}','App\Http\Controllers\Api\Parent\ParentController@parentByID');
//Route::post('newParent','App\Http\Controllers\Api\Parent\ParentController@create');
//Route::put('parent/{parent}','App\Http\Controllers\Api\Parent\ParentController@parentUpdate');
//Route::get('getParents','App\Http\Controllers\Api\Parent\ParentController@parents');
//category resource index,show,...



Route::get('/admins',[AdminsController::class,'index']);
Route::get('/admin/{id}',[AdminsController::class,'show']);
Route::post('/admins',[AdminsController::class,'store']);
Route::post('/admin/{id}',[AdminsController::class,'update']);
Route::post('/admins/{id}',[AdminsController::class,'destroy']);



Route::get('/accounts',[AccountsController::class,'index']);
Route::get('/account/{id}',[AccountsController::class,'show']);
Route::post('/accounts',[AccountsController::class,'store']);
Route::post('/account/{id}',[AccountsController::class,'update']);
Route::post('/accounts/{id}',[AccountsController::class,'destroy']);



Route::get('/instructors',[InstructorsController::class,'index']);
Route::get('/instructor/{id}',[InstructorsController::class,'show']);
Route::post('/instructors',[InstructorsController::class,'store']);
Route::post('/instructor/{id}',[InstructorsController::class,'update']);
Route::post('/instructors/{id}',[InstructorsController::class,'destroy']);



Route::get('/instructors_supports',[InstructorsSupportController::class,'index']);
Route::get('/instructors_support/{id}',[InstructorsSupportController::class,'show']);
Route::post('/instructors_supports',[InstructorsSupportController::class,'store']);
Route::post('/instructors_support/{id}',[InstructorsSupportController::class,'update']);
Route::post('/instructors_supports/{id}',[InstructorsSupportController::class,'destroy']);
// =======
////
// >>>>>>> origin/Ahmed_Elnemr
