<?php

// use Illuminate\Http\Request;
// use App\Http\Controllers\api\EmpresaController;
// use App\Http\Controllers\api\FuncionarioController;
// use App\Http\Controllers\api\LinhaController;

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Route;

// ROTAS EXCLUSIVAS DO ADM
Route::post('empresas', [EmpresaController::class, 'store']);
Route::post('funcionarios', [FuncionarioController::class, 'store']);
Route::get('funcionarios', [FuncionarioController::class, 'index']);
Route::delete('funcionarios/{id}', [FuncionarioController::class, 'delete']);
Route::delete('empresas/{id}', [EmpresaController::class, 'delete']);

// Rotas Empresas
Route::get('empresas', [EmpresaController::class, 'index']);
Route::get('empresas/{id}', [EmpresaController::class, 'show']);
Route::put('empresas/{id}', [EmpresaController::class, 'update']);

//Rotas linhas

Route::get('linhas', [LinhaController::class, 'index']);
Route::get('linhas/{id}', [LinhaController::class, 'show']);
Route::get('linhas/viagens', [LinhaController::class, 'showViagens']);

Route::post('linhas', [LinhaController::class, 'store']);
Route::post('linhas/{id}/viagens', [LinhaController::class, 'addViagensToLinha']);
Route::delete('linhas/{id}', [LinhaController::class, 'delete']);