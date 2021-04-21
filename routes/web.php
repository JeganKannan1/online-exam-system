<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamController;




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

// Route::get('login', function () {
//     echo 'hello';
// });

Route::get('/index',[AdminAuthController::class,'index'])->name('index')->middleware('admin');
Route::get('/login',[AdminAuthController::class,'login'])->name('login');
Route::post('/login-admin',[AdminAuthController::class,'AdminLogin'])->name('login-admin');
Route::get('/team',[TeamController::class,'addTeam'])->name('team')->middleware('admin');
Route::post('/create-team',[TeamController::class,'createTeam'])->name('create-team');
Route::get('/delete/{team}',[TeamController::class,'delete'])->name('delete')->middleware('admin');
Route::get('/edit/{team}',[TeamController::class,'edit'])->name('edit')->middleware('admin');
Route::post('/update-team',[TeamController::class,'updateTeam'])->name('update-team');
Route::get('/user',[UserController::class,'addUser'])->name('user')->middleware('admin');
Route::get('/role',[RoleController::class,'addRole'])->name('role')->middleware('admin');
Route::post('/add-role',[RoleController::class,'createRole'])->name('add-role');
Route::get('/edit-role/{role}',[RoleController::class,'editRole'])->name('edit-role')->middleware('admin');
Route::post('/update-role',[RoleController::class,'updateRole'])->name('update-role');
Route::get('/delete-role/{role}',[RoleController::class,'deleteRole'])->name('delete-role')->middleware('admin');
Route::post('/create-user',[UserController::class,'createUser'])->name('create-user');
Route::get('/edit-user/{user}',[UserController::class,'editUser'])->name('edit-user')->middleware('admin');
Route::post('/update-user',[UserController::class,'updateUser'])->name('update-user');
Route::get('/delete-user/{user}',[UserController::class,'deleteUser'])->name('delete-user')->middleware('admin');
Route::get('/logout',[AdminAuthController::class,'logout'])->name('logout');
Route::post('/add-question',[ExamController::class,'addQuestion'])->name('add-question');
Route::get('/employee',[ExamController::class,'employeeDashboard'])->name('employee');
Route::get('/take-test',[ExamController::class,'takeTest'])->name('take-test');
Route::post('/check-answer',[ExamController::class,'checkAnswer'])->name('check-answer');






?>