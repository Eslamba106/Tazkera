<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\SupportTeamController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//################################## Route User ##############################################

Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest')->name('login.user');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout.user');

//################################## Route Admin ##############################################

Route::post('/login/admin', [AdminController::class, 'store'])->middleware('guest')->name('login.admin');

Route::get('/logout/admin', [AdminController::class, 'destroy'])->middleware('auth:admin')->name('logout.admin');

//#############################################################################################


//################################## Route support_team ##############################################

Route::post('/login/support_team', [SupportTeamController::class, 'store'])->middleware('guest')->name('login.support_team');

Route::get('/logout/support_team', [SupportTeamController::class, 'destroy'])->middleware('auth:support_team')->name('logout.support_team');

//#############################################################################################