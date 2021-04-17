<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

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
Route::get('/index','AdminAuthController@index')->name('index')->middleware('admin');
// Route::post('/login-admin','AdminAuthController@adminLogin')->name('login-admin');
Route::get('/login','AdminAuthController@login')->name('login');
Route::post('/login-admin','AdminAuthController@adminLogin')->name('login-admin');
Route::get('/team','AdminAuthController@addTeam')->name('team')->middleware('admin');
Route::post('/create-team','AdminAuthController@createTeam')->name('create-team');
Route::get('/delete/{team}','AdminAuthController@delete')->name('delete')->middleware('admin');
Route::get('/edit/{team}','AdminAuthController@edit')->name('edit')->middleware('admin');
Route::post('/update-team','AdminAuthController@updateTeam')->name('update-team');
Route::get('/user','AdminAuthController@addUser')->name('user')->middleware('admin');
Route::get('/role','AdminAuthController@addRole')->name('role')->middleware('admin');
Route::post('/add-role','AdminAuthController@createRole')->name('add-role');
Route::get('/edit-role/{role}','AdminAuthController@editRole')->name('edit-role')->middleware('admin');
Route::post('/update-role','AdminAuthController@updateRole')->name('update-role');
Route::get('/delete-role/{role}','AdminAuthController@deleteRole')->name('delete-role')->middleware('admin');
Route::post('/create-user','AdminAuthController@createUser')->name('create-user');
Route::get('/edit-user/{user}','AdminAuthController@editUser')->name('edit-user')->middleware('admin');
Route::post('/update-user','AdminAuthController@updateUser')->name('update-user');
Route::get('/delete-user/{user}','AdminAuthController@deleteUser')->name('delete-user')->middleware('admin');
Route::get('/logout','AdminAuthController@logout')->name('logout');






?>