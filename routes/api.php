<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\EmpresaController;
use App\Http\Controllers\api\FuncionarioController;

// ROTAS EXCLUSIVAS DO ADM
Route::post('empresas', [EmpresaController::class, 'store']);
Route::post('funcionarios', [FuncionarioController::class, 'store']);
Route::delete('funcionarios/{id}', [FuncionarioController::class, 'delete']);
Route::delete('empresas/{id}', [EmpresaController::class, 'delete']);

// Rotas Empresas
Route::get('empresas', [EmpresaController::class, 'index']);
Route::get('empresas/{id}', [EmpresaController::class, 'show']);
Route::put('empresas/{id}', [EmpresaController::class, 'update']);
