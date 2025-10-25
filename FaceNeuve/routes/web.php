<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetLocaleController;
use App\Models\Forum;

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

// Eleve/Student on peux les vois juste si on est connecte
Route::middleware('auth')->group(function () {
    Route::get("/create/student", [StudentController::class, 'create'])->name('student.create');
    Route::get("/create/student", [StudentController::class, 'create'])->name('student.create');
    Route::get("/edit/student/{student}", [StudentController::class, 'edit'])->name('student.edit');
    Route::get("/show/student/{student}", [StudentController::class, 'show'])->name('student.show');
    Route::put("/edit/student/{student}", [StudentController::class, 'update'])->name('student.update');
    Route::post("/create/student", [StudentController::class, 'store'])->name('student.store');
    Route::get("/index/student", [StudentController::class, 'index'])->name('student.index');
    Route::delete("/student/{student}", [StudentController::class, 'destroy'])->name('student.destroy');
});

// User
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/show/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{user}', [UserController::class, 'profil'])->name('user.profil');
    Route::get('/edit/user/{user}', [UserController::class, 'edit'])->name('user.edit');
});

Route::get('/registration', [UserController::class, 'create'])->name('user.create');
Route::post('/registration', [UserController::class, 'store'])->name('user.store');

// Connection 
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

// Definition de langue
Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

// Forum
Route::middleware('auth')->group(function () {
    Route::get("/create/forum", [ForumController::class, 'create'])->name('forum.create');
    Route::post("/create/forum", [ForumController::class, 'store'])->name('forum.store');
    Route::get("/edit/forum/{forum}", [ForumController::class, 'edit'])->name('forum.edit');
    Route::post("/edit/forum/{forum}", [ForumController::class, 'update'])->name('forum.update');
    Route::delete("/index/forum", [ForumController::class, 'destroy'])->name('forum.destroy');
});
Route::get("/index/forum", [ForumController::class, 'index'])->name('forum.index');

// Document
Route::middleware('auth')->group(function () {
    Route::resource('documents', DocumentController::class);
});