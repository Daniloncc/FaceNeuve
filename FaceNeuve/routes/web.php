<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/create/student", [StudentController::class, 'create'])->name('student.create');

Route::get("/create/student", [StudentController::class, 'create'])->name('student.create');

Route::post("/create/student", [StudentController::class, 'store'])->name('student.store');

Route::get("/index/student", [StudentController::class, 'index'])->name('student.index');
