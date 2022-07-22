<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('courseContents', App\Http\Controllers\courseContent::class);
Route::resource('offers', App\Http\Controllers\Offer::class);
Route::resource('coursestudent', App\Http\Controllers\CourseStudent::class);
require __DIR__.'/auth.php';
