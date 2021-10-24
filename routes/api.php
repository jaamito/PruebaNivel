<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API Factor Energía 
Route::get('/info', [App\Http\Controllers\ApiFactorEnergia::class, 'info'])->name('info');
Route::get('/random', [App\Http\Controllers\ApiFactorEnergia::class, 'random'])->name('random');
Route::get('/getQuestions', [App\Http\Controllers\ApiFactorEnergia::class, 'getQuestions']);
