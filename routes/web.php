<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthRegisterController;

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
Route::get('test-email', [StudentController::class, 'testEmail']);
Route::get('students', [StudentController::class, 'index'])->name('student.all');
Route::get('them-sinhvien', [StudentController::class, 'addstudent'])->name('student.add');
Route::POST('them-sinhvien', [StudentController::class, 'store'])->name('student.store');
Route::get('edit-sinhvien/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('update-sinhvien/{id}', [StudentController::class, 'update'])->name('student.update');
// Route::get('delete-sinhvien/{id}', [StudentController::class, 'delete'])->name('student.delete');
Route::delete('delete-sinhvien/{id}', [StudentController::class, 'delete'])->name('student.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/actived/{user}/{token}',[App\Http\Controllers\Auth\RegisterController::class,'actived'])->name('user.actived');
Route::post('/login',[App\Http\Controllers\Auth\RegisterController::class,'postLogin'])->name('postLogin');
Route::get('/login',[App\Http\Controllers\Auth\RegisterController::class,'index'])->name('user.login');
