<?php

use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Category\SubCategoryController;
use App\Http\Controllers\Api\Course\CourseController;
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
//category resource index,show,...
Route::resource('category', CategoryController::class);
//git subCategories by Category id
Route::get('getSubCategoriesByCategoryId/{Category_id}', [CategoryController::class,'getSubCategories']);
//subcategory resource index,show,...
Route::resource('subcategory', SubCategoryController::class);
// get courses by sucat id
Route::get('getCourseBySubCategoryId/{SubCategory_id}', [SubCategoryController::class,'getCourses']);
// courses resource index,show,....
Route::resource('course', CourseController::class);
// search by course name
Route::get('getCourses/{course_name}', [CourseController::class,'getCoursesByName']);
// get the average rate of course by its id
Route::get('getRates/{course_id}', [CourseController::class,'avrageRate']);
// get the rates and comments   of course by its id
Route::get('feedbacks/{course_id}', [CourseController::class,'feedbacks']);
// get limit top rated courses
Route::get('getTopRated/{limit}', [CourseController::class,'getTopRated']);
