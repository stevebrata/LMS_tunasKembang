<?php

use App\Models\StudentAnswer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentAnswerController;

Route::get('/', function () {
    return view('welcome', ['title'=> 'Welcome']);
})->middleware('guest');
Route::resource('/grade',GradeController::class)->middleware('auth');
Route::resource('/subject',SubjectController::class)->middleware('auth');;
Route::resource('/student',StudentController::class)->middleware('auth');;
Route::resource('/teacher',TeacherController::class)->middleware('auth');;
Route::resource('/login',LoginController::class);
Route::post('/logout',[LoginController::class,'logout'])->middleware('auth');;
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::resource('/register',RegisterController::class)->middleware('auth');;
Route::resource('/dashboard',DashboardController::class)->middleware('auth');
Route::resource('/users',UserController::class)->middleware('auth');;
Route::resource('/post',PostController::class)->middleware('auth');
Route::get('/download',[PostController::class,'download'])->middleware('auth');
Route::resource('/test',TestController::class)->middleware('auth');
Route::resource('/question',QuestionController::class)->middleware('auth');
Route::resource('/score',StudentAnswerController::class)->middleware('auth');