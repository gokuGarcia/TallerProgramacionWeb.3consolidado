<?php

use App\Http\Controllers\api\comunaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/comunas', [comunaController::class, 'index'])->name('comunas');


//Route::get('/user', function (Request $request) {
 //   return $request->user();
//})->middleware('auth:sanctum');