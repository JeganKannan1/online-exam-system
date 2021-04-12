<?php 
use Modules\Authentication\controller\AdminAuthController;
use Illuminate\Support\Facades\Route;

// Route::get('login', function () {
//     return view ('auth::login');
// });
Route::get('/login',[AdminAuthController::class, 'login'])->name('login');
// Route::post('/login-admin','AdminAuthController@adminLogin')->name('login-admin');
?>