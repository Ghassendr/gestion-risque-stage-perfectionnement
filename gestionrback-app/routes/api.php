<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActifController;
use App\Http\Controllers\RisqueController;
use App\Http\Controllers\ptrController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\Auth\AuthController;

Route::post('/savetype',[App\Http\Controllers\TypeController::class, 'ajout']);


Route::get('/actifs',[App\Http\Controllers\ActifController::class, 'index']);
Route::post('/save',[App\Http\Controllers\ActifController::class, 'store']);
Route::post('/update{id}',[App\Http\Controllers\ActifController::class, 'update']);
Route::delete('/delete/{id}',[App\Http\Controllers\ActifController::class, 'destroy']);
Route::get('/risques',[App\Http\Controllers\RisqueController::class, 'index']);
Route::get('/actifs2',[App\Http\Controllers\ActifController::class, 'index2']);

Route::post('/savee',[App\Http\Controllers\RisqueController::class, 'ajouter']);



Route::post('/add',[App\Http\Controllers\ptrController::class, 'store3']);


Route::get('/types',[App\Http\Controllers\TypeController::class, 'index']);


Route::delete('/deleterisque/{id}',[App\Http\Controllers\RisqueController::class, 'destroy']);


Route::delete('/deleteptr/{id}',[App\Http\Controllers\ptrController::class, 'destroy']);

Route::get('/risquecretique',[App\Http\Controllers\RisqueController::class, 'Cretique']);

Route::get('/ptrs',[App\Http\Controllers\ptrController::class, 'index']);


Route::group(['prefix'=>"/Auth"],function(){
    Route::post('/login',[AuthController::class,'Login']); 
    Route::post('/register',[AuthController::class,'register']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
