<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OperationsController;

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

Route::get('/', [UserController::class, 'index' ]);
Route::get('/login', [UserController::class, 'view_login'])->name('login')->middleware('guest');
Route::get('/signup', [UserController::class, 'view_signup'])->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/authe', [UserController::class, 'authentication'])->middleware('guest');
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');
Route::get('/dashboard',[OperationsController::class, 'view_dash'])->middleware('auth');
Route::get('/create_goal',[OperationsController::class, 'view_goal'])->middleware('auth');
Route::get('/plan_schedule',[OperationsController::class, 'schedule_plan'])->middleware('auth');
Route::get('/getpdf',[OperationsController::class, 'get_pdf'])->middleware('auth');
Route::post('/create_new_goal',[OperationsController::class, 'schedule'])->middleware('auth');
Route::post('/img_upload',[OperationsController::class, 'upload_img'])->middleware('auth');
Route::get('/tet',[OperationsController::class, 'getUsers']);
