<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UpcomingHolidayController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/', function () {
    return view('welcome'); }
);


Route::get('holidays', [UpcomingHolidayController::class, 'index']);

Route::get('/usersimage/{id}', [UserController::class, 'image']);
Route::post('login/user', [UserController::class, 'loginUser']);
Route::post('google-login', [UserController::class,'googleLogin']);
Route::group(['middleware' => 'auth:sanctum'], function () {
Route::get('user', [UserController::class, 'userDetails']);
Route::get('user/{id}', [UserController::class, 'index']);
Route::get('supportticket/{id}', [UserController::class, 'supportTicket']);
Route::get('project/{id}', [UserController::class, 'userProject']);
Route::get('bonus/{id}', [UserController::class, 'bonus']);
Route::get('bonus/{id}', [UserController::class, 'bonus']);
Route::get('logout', [UserController::class, 'logout']);
});