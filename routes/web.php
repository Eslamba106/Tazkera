<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\TazkraController;

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

Route::get('/user/dashboard', [TazkraController::class, 'index'])->name('user.dashboard');


################################# ADD TAZKRA ###############################################

// Route::get('user/dashboard' , [TazkraController::class , 'index'])->name('user.dashboard.index');
Route::get('user/dashboard/create', [TazkraController::class, 'create'])->name('user.dashboard.create');
Route::post('user/dashboard/store', [TazkraController::class, 'store'])->name('user.dashboard.store');
Route::get('user/dashboard/edit/{id}', [TazkraController::class, 'edit'])->name('user.dashboard.edit');
Route::get('user/dashboard/show/{id}', [TazkraController::class, 'show'])->name('user.dashboard.show');
Route::post('user/dashboard/update', [TazkraController::class, 'update'])->name('user.dashboard.update');
Route::post('user/dashboard/delete/{id}', [TazkraController::class, 'delete'])->name('user.dashboard.delete');






require __DIR__ . '/auth.php';
