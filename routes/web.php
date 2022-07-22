<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\InstructorsSupportController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::controller(AdminsController::class)->group(function () {
    Route::get('admins/create', 'create');
    Route::get('admins/index', 'index');
    Route::get('admins/edit/{id}', 'edit');
    Route::get('admins/update/{id}', 'update');
    Route::get('admins/delete/{id}', 'delete');
    
});

Route::controller(AccountsController::class)->group(function () {
    Route::get('accounts/create', 'create');
    Route::get('accounts/index', 'index');
    Route::get('accounts/edit/{id}', 'edit');
    Route::get('accounts/update/{id}', 'update');
    Route::get('accounts/delete/{id}', 'delete');
    
});

Route::controller(ParentsController::class)->group(function () {
    Route::get('parents/create', 'create');
    Route::get('parents/index', 'index');
    Route::get('parents/edit/{id}', 'edit');
    Route::get('parents/update/{id}', 'update');
    Route::get('parents/delete/{id}', 'delete');
    
});





Route::controller(InstructorsController::class)->group(function () {
    Route::get('instructors/create', 'create');
    Route::get('instructors/index', 'index');
    Route::get('instructors/edit/{id}', 'edit');
    Route::get('instructors/update/{id}', 'update');
    Route::get('instructors/delete/{id}', 'delete');
    
});


Route::controller(InstructorsSupportController::class)->group(function () {
    Route::get('instructors_support/create', 'create');
    Route::get('instructors_support/index', 'index');
    Route::get('instructors_support/edit/{id}', 'edit');
    Route::get('instructors_support/update/{id}', 'update');
    Route::get('instructors_support/delete/{id}', 'delete');
    
});



