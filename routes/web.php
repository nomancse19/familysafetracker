<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
   return redirect()->route('login');
});


Route::get('/Noman/01923593809/Web/Server/Down', function () {
   Artisan::call('down --secret="01923593809-131905-213609"');
   return "ok";
});

Route::get('/Noman/01923593809/Web/Server/Up', function () {
   Artisan::call('up');
   return "ok";
});


Route::get('/Noman/01923593809/Web/Server/Setup', function () {
   Artisan::call('migrate:fresh');
   Artisan::call('db:seed');
   return "ok";
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
