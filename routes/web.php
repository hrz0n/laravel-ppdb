<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegisterController;
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
    return view('welcome');
});


Route::get('/login',[LoginController::class, 'showLogin'])->name('login');
Route::post('/processLogin',[LoginController::class, 'processLogin'])->name('processLogin');
Route::get('/processLogout',[LoginController::class, 'processLogout'])->name('processLogout');
Route::get('/register',[RegisterController::class,'showRegister'])->name('register');
Route::post('/processRegister',[RegisterController::class,'processRegister'])->name('processRegister');

Route::group(['middleware' => ['auth','level:1,2,3']], function (){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
});
