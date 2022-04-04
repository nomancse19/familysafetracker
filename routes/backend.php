<?php

use App\Http\Controllers\Backend\AdminAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Start Admin Auth

Route::get('Backend/Admin/login',[AdminAuthController::class,'admin_login_page'])->name('login');
Route::post('Backend/Admin/login/Check',[AdminAuthController::class,'check_admin_login_data'])->name('admin.login.post');
