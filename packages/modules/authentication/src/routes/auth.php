<?php 
// use Modules\Authentication\controller\AdminAuthController;
use Illuminate\Support\Facades\Route;

// Route::get('login', function () {
//     return view ('auth::login');
// });
Route::get('/login','Modules\Authentication\controller\AdminAuthController@login')->name('login');
Route::post('/login-admin','Modules\Authentication\controller\AdminAuthController@adminLogin')->name('login-admin');
Route::get('/team','Modules\Authentication\controller\AdminAuthController@addTeam')->name('team');
Route::post('/create-team','Modules\Authentication\controller\AdminAuthController@createTeam')->name('create-team');
Route::get('/delete/{team}','Modules\Authentication\controller\AdminAuthController@delete')->name('delete');
Route::get('/edit/{team}','Modules\Authentication\controller\AdminAuthController@edit')->name('edit');
Route::post('/update-team','Modules\Authentication\controller\AdminAuthController@updateTeam')->name('update-team');

?>