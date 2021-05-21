<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminexamController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\QueryController;




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

Route::get('/', [AdminAuthController::class,'welcome'])->name('welcome');

Route::get('/index',[AdminAuthController::class,'index'])->name('index')->middleware('admin');
Route::get('/login',[AdminAuthController::class,'login'])->name('login');
Route::post('/login-admin',[AdminAuthController::class,'AdminLogin'])->name('login-admin');
Route::get('/logout',[AdminAuthController::class,'logout'])->name('logout');
Route::get('/monthly-reports',[AdminAuthController::class,'monthlyReport'])->name('monthly-reports')->middleware('admin');
Route::get('/domain-report/{id}',[AdminAuthController::class,'teamReport'])->name('domain-report')->middleware('admin');
// Route::get('/user-detail',[AdminAuthController::class,'userScore'])->name('user-detail')->middleware('admin');
Route::get('/user-score/{id}',[AdminAuthController::class,'teamScore'])->name('user-score')->middleware('admin');

Route::get('/dashboard',[UserController::class,'empDashboard'])->name('dashboard')->middleware('admin');
Route::get('/user',[UserController::class,'addUser'])->name('user')->middleware('admin');
Route::post('/create-user',[UserController::class,'createUser'])->name('create-user');
Route::get('/edit-user/{user}',[UserController::class,'editUser'])->name('edit-user')->middleware('admin');
Route::post('/update-user',[UserController::class,'updateUser'])->name('update-user');
Route::get('/delete-user/{user}',[UserController::class,'deleteUser'])->name('delete-user')->middleware('admin');


Route::get('/role',[RoleController::class,'addRole'])->name('role')->middleware('admin');
Route::post('/add-role',[RoleController::class,'createRole'])->name('add-role');
Route::get('/edit-role/{role}',[RoleController::class,'editRole'])->name('edit-role')->middleware('admin');
Route::post('/update-role',[RoleController::class,'updateRole'])->name('update-role');
Route::get('/delete-role/{role}',[RoleController::class,'deleteRole'])->name('delete-role')->middleware('admin');


Route::get('/tl-dashboard',[TeamController::class,'tlDashboard'])->name('tl-dashboard')->middleware('admin');
Route::get('/team-report',[TeamController::class,'teamReport'])->name('team-report')->middleware('admin');
Route::get('/user-report/{id}',[TeamController::class,'userReport'])->name('user-report')->middleware('admin');
Route::get('/team',[TeamController::class,'addTeam'])->name('team')->middleware('admin');
Route::post('/create-team',[TeamController::class,'createTeam'])->name('create-team');
Route::get('/delete/{team}',[TeamController::class,'delete'])->name('delete')->middleware('admin');
Route::get('/edit/{team}',[TeamController::class,'edit'])->name('edit')->middleware('admin');
Route::post('/update-team',[TeamController::class,'updateTeam'])->name('update-team');


Route::post('/add-question',[ExamController::class,'addQuestion'])->name('add-question');
Route::get('/created',[ExamController::class,'newQuestion'])->name('created')->middleware('admin');Route::get('/created',[ExamController::class,'newQuestion'])->name('created')->middleware('admin');
Route::get('/created-questions/{team_id}/{id}',[ExamController::class,'createdQuestion'])->name('created-questions')->middleware('admin');
Route::get('/test-report/{id}',[ExamController::class,'showTest'])->name('test-report')->middleware('admin');
Route::get('/delete-question/{team}',[ExamController::class,'deleteQuestion'])->name('delete-question')->middleware('admin');
Route::get('/edit-question/{team}',[ExamController::class,'editQuestion'])->name('edit-question')->middleware('admin');
Route::post('/update-question',[ExamController::class,'updateQuestion'])->name('update-question');
Route::get('/create-question',[ExamController::class,'createQuestion'])->name('create-question')->middleware('admin');

Route::get('/list-team',[AdminexamController::class,'listTeam'])->name('list-team')->middleware('admin');
Route::get('/make-question/{id}',[AdminexamController::class,'makeQuestion'])->name('make-question')->middleware('admin');
Route::post('/set-question',[AdminexamController::class,'setQuestion'])->name('set-question');
Route::get('/display-questions/{id}',[AdminexamController::class,'displayQuestion'])->name('display-questions')->middleware('admin');
Route::get('/change-question/{team}',[AdminexamController::class,'changeQuestion'])->name('change-question')->middleware('admin');
Route::post('/rewrite-question',[AdminexamController::class,'rewriteQuestion'])->name('rewrite-question');
Route::get('/list-team1',[AdminexamController::class,'listTeam1'])->name('list-team1')->middleware('admin');


Route::get('/take-exam',[TestController::class,'testName'])->name('take-exam')->middleware('admin');
Route::get('/instruction',[TestController::class,'instruction'])->name('instruction')->middleware('admin');
Route::post('/take-test',[TestController::class,'takeTest'])->name('take-test')->middleware('admin');
Route::post('/check-answer',[TestController::class,'checkAnswer'])->name('check-answer');
Route::get('/answer',[TestController::class,'answerPage'])->name('answer')->middleware('admin');
Route::get('/report',[TestController::class,'monthlyReport'])->name('report')->middleware('admin');

Route::get('/forgot-password',[ForgotPasswordController::class,'setEmail'])->name('forgot-password');
Route::post('/send-mail',[ForgotPasswordController::class,'sendMail'])->name('send-mail');
Route::get('/redirect',[ForgotPasswordController::class,'reDirect'])->name('redirect');
Route::get('/reset-password/{id}',[ForgotPasswordController::class,'resetPassword'])->name('reset-password');
Route::post('/update-password',[ForgotPasswordController::class,'updatePassword'])->name('update-password');

Route::get('/delete-test/{id}/{testId}',[QueryController::class,'deleteTest'])->name('delete-test');
Route::get('/query',[QueryController::class,'query'])->name('query')->middleware('admin');
Route::post('/user-query',[QueryController::class,'userQuery'])->name('user-query')->middleware('admin');
Route::get('/show-query',[QueryController::class,'showQuery'])->name('show-query')->middleware('admin');

?>