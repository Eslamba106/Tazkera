<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\GroupController;
use App\Http\Controllers\admin\SupportTeamController;

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


########################################## Support Team Routes ###################################################
Route::get('/admin/support_team' , [SupportTeamController::class , 'index'])->name('admin.support_team.index');
Route::get('/admin/support_team/create' , [SupportTeamController::class , 'create'])->name('admin.support_team.create');
Route::post('/admin/support_team/store' , [SupportTeamController::class , 'store'])->name('admin.support_team.store');
Route::get('/admin/support_team/edit/{id}' , [SupportTeamController::class , 'edit'])->name('admin.support_team.edit');
Route::post('/admin/support_team/delete/{id}' , [SupportTeamController::class , 'delete'])->name('admin.support_team.delete');
Route::post('/admin/support_team/update' , [SupportTeamController::class , 'update'])->name('admin.support_team.update');


######################################## Groups Routes ############################################################

Route::get('/admin/groups' , [GroupController::class , 'index'])->name('admin.groups.index');
Route::get('/admin/groups/create' , [GroupController::class , 'create'])->name('admin.groups.create');
Route::post('/admin/groups/store' , [GroupController::class , 'store'])->name('admin.groups.store');
Route::get('/admin/groups/edit/{id}' , [GroupController::class , 'edit'])->name('admin.groups.edit');
Route::post('/admin/groups/delete/{id}' , [GroupController::class , 'delete'])->name('admin.groups.delete');
Route::post('/admin/groups/update' , [GroupController::class , 'update'])->name('admin.groups.update');


######################################## Users Routes ############################################################

Route::get('/admin/users' , [UserController::class , 'index'])->name('admin.users.index');
Route::get('/admin/users/create' , [UserController::class , 'create'])->name('admin.users.create');
Route::post('/admin/users/store' , [UserController::class , 'store'])->name('admin.users.store');
Route::get('/admin/users/edit/{id}' , [UserController::class , 'edit'])->name('admin.users.edit');
Route::post('/admin/users/delete/{id}' , [UserController::class , 'delete'])->name('admin.users.delete');
Route::post('/admin/users/update' , [UserController::class , 'update'])->name('admin.users.update');





require __DIR__.'/auth.php';