<?php

use App\Http\Controllers\admin\SupportTeamController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');

Route::get('/admin/support_team' , [SupportTeamController::class , 'index'])->name('admin.support_team.index');
Route::get('/admin/support_team/create' , [SupportTeamController::class , 'create'])->name('admin.support_team.create');
Route::post('/admin/support_team/store' , [SupportTeamController::class , 'store'])->name('admin.support_team.store');
require __DIR__.'/auth.php';