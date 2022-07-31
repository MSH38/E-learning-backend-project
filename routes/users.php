<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\InstructorsSupportController;
use App\Http\Controllers\CategoryController;
Route::resource('/users',\App\Http\Controllers\Users\UserController::class)->middleware('auth');
Route::resource('/admins',\App\Http\Controllers\Users\AdminController::class)->middleware('auth');
Route::resource('/parents',\App\Http\Controllers\Users\ParentController::class)->middleware('auth');
Route::resource('/instructors',\App\Http\Controllers\Users\InstructorController::class)->middleware('auth');
Route::resource('/students',\App\Http\Controllers\Users\StudentController::class)->middleware('auth');
