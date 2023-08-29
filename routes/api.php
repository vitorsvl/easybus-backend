<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\EmpresaController;


Route::get('empresas', [EmpresaController::class, 'index']);
Route::post('empresas', [EmpresaController::class, 'store']);
Route::get('empresas/{id}', [EmpresaController::class, 'show']);
Route::put('empresas/{id}', [EmpresaController::class, 'update']);
Route::delete('empresas/{id}', [EmpresaController::class, 'delete']);
