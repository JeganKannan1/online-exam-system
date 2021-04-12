<?php 
// use Modules\Authentication\controller\AdminAuthController;
use Illuminate\Support\Facades\Route;

// Route::get('login', function () {
//     return view ('auth::login');
// });
Route::get('/login','Modules\Authentication\controller\AdminAuthController@login')->name('login');
Route::post('/login-admin','Modules\Authentication\controller\AdminAuthController@adminLogin')->name('login-admin');
?>