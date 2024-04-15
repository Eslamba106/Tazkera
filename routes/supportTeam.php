<?php

use App\Http\Controllers\support\SupportTeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

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

Route::get('/support_team/dashboard', [SupportTeamController::class , 'index'])->name('support_team.dashboard');

Route::get('support_team/dashboard/show/{id}' , [SupportTeamController::class , 'show'] )->name('support_team.dashboard.show');
################################################# Chat ###########################################
Route::get('support_team/chat/{id}' ,[ChatController::class , 'chatForm'])->name('chat_form');//->middleware('auth:web,supportTeam');
Route::post('support_team/chat/{id}' ,[ChatController::class , 'sendMessage'])->middleware('auth:web,support_team');




require __DIR__.'/auth.php';
