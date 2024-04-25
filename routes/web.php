<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/students',[studentController::class,"index"] );
// Route::get('/students/create',[studentController::class,'create'] );
// Route::post('/students',[studentController::class,'store'] );
// Route::get('/students/{id}',[studentController::class,'show'] );
// Route::get('/students/{id}/edit',[studentController::class,'edit'] );
// Route::patch('/students/{id}',[studentController::class,'update'] );
// Route::delete('/students/{id}', [studentController::class,'destroy'] );

Route::resource("students",StudentController::class)->middleware('auth');
Route::patch('/students/{id}', [studentController::class,'update'])->name('students.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
