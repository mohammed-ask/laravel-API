<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\loginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::ger('newroute',function(){return "hello";});
Route::post('register',[registerController::class,'register']);
Route::post('login',[loginController::class,'login'])->name('login');
Route::get('login',[loginController::class,'login'])->name('login');
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/show',  [EmployController::class,'index']);
    Route::post('/create', [EmployController::class,'create']);
    Route::put('/update', [EmployController::class,'update']);
    Route::delete('delete/{id}',[EmployController::class,'delete']);
    Route::get('logout',[logoutController::class,'logout']);
});

