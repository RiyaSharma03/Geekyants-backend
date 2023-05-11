<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UpcomingHolidayController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('user/{id}', [UserController::class,'index']);
Route::get('supportticket/{id}', [UserController::class,'supportTicket']);
Route::get('project/{id}', [UserController::class,'userProject']);
Route::get('holidays', [UpcomingHolidayController::class,'index']);
Route::get('bonus/{id}', [UserController::class,'bonus']);
Route::get('/usersimage/{id}', [UserController::class,'image']);