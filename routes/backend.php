<?php

use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Start Admin Auth

Route::get('Backend/Admin/login',[AdminAuthController::class,'admin_login_page'])->name('login');
Route::post('Backend/Admin/login/Check',[AdminAuthController::class,'check_admin_login_data'])->name('admin.login.post');



//Start Dashboard Controller 
Route::get('Backend/Dashboard',[HomeController::class,'dashboard'])->name('admin.dashboard');

Route::get('Backend/User/AddNewUser',[AdminController::class,'add_new_user_form'])->name('admin.user.add.form');


