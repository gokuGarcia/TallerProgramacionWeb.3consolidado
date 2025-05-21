<?php

use App\Http\Controllers\api\comunaController;
use App\Http\Controllers\api\municipioCOntroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/comunas', [comunaController::class, 'store'])->name('comunas.store');
Route::get('/comunas', [comunaController::class, 'index'])->name('comunas');
Route::delete('/comunas/{comuna}', [comunaController::class, 'destroy'])->name('comunas.destroy');
Route::get('/comunas/{comuna}', [comunaController::class, 'show'])->name('comunas.show');
Route::put('/comunas/{comuna}', [comunaController::class, 'update'])->name('comunas.update');

Route::get('/municipios', [municipioCOntroller::class, 'index'])->name('municipios');

