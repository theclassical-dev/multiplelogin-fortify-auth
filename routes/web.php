<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/login', [MainController::class,'index'])->name('admin.login');

Route::post('/admin/login', [MainController::class,'login'])->name('admin.login.submit');

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class,'index'])->name('admin.dashboard');
});

