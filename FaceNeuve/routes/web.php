<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
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

// Page accueil
Route::get('/', function () {
    return view('welcome');
});

// Eleve/Student
Route::get("/create/student", [StudentController::class, 'create'])->name('student.create');
Route::get("/create/student", [StudentController::class, 'create'])->name('student.create');
Route::get("/edit/student/{student}", [StudentController::class, 'edit'])->name('student.edit');
Route::get("/show/student/{student}", [StudentController::class, 'show'])->name('student.show');
Route::put("/edit/student/{student}", [StudentController::class, 'update'])->name('student.update');
Route::post("/create/student", [StudentController::class, 'store'])->name('student.store');
Route::get("/index/student", [StudentController::class, 'index'])->name('student.index');
Route::delete("/student/{student}", [StudentController::class, 'destroy'])->name('student.destroy');


// Connection 
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
