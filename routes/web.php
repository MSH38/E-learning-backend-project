<?php

use App\Http\Controllers\StudentController;
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

require __DIR__.'/auth.php';

///route Nr
Route::resource('Students',\App\Http\Controllers\StudentController::class);
Route::resource('StudentsSupport',\App\Http\Controllers\StudentSupportController::class);
Route::resource('exam',\App\Http\Controllers\ExamController::class);
Route::resource('examContetn',\App\Http\Controllers\ExamContentController::class);
Route::resource('certification',\App\Http\Controllers\CertificationController::class);
Route::resource('StudentExam',\App\Http\Controllers\StudentExamController::class);
//done Nr




