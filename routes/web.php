<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\loginController;
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

Route::group(['middleware' => ['auth','level:2,3']], function (){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
});
