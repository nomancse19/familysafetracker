<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Start Admin Auth

Route::get('Backend/Admin/login',[AdminAuthController::class,'admin_login_page'])->name('login');
Route::post('Backend/Admin/login/Check',[AdminAuthController::class,'check_admin_login_data'])->name('admin.login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//Start Dashboard Controller 
Route::get('Backend/Dashboard',[HomeController::class,'dashboard'])->name('admin.dashboard');


Route::prefix("Backend")->group(function(){
Route::get('User/AddNewUser',[AdminController::class,'add_new_user_form'])->name('admin.user.add.form');
});



Route::group(['prefix' => 'Backend', 'middleware' => 'Super_admin'], function () {

Route::get('User/AddNewUser',[AdminController::class,'add_new_user_form'])->name('admin.user.add.form');
Route::post('User/SaveNewUser',[AdminController::class,'save_new_user'])->name('admin.user.save.post');



});








