<?php

// use Illuminate\Http\Request;
// use App\Http\Controllers\api\EmpresaController;
// use App\Http\Controllers\api\FuncionarioController;

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Route;


// ROTAS EXCLUSIVAS DO ADM
Route::post('empresas', [EmpresaController::class, 'store']);
Route::post('funcionarios', [FuncionarioController::class, 'store']);
Route::get('funcionarios', [FuncionarioController::class, 'index']);
Route::get('funcionarios/{id}', [FuncionarioController::class, 'show']);
Route::delete('funcionarios/{id}', [FuncionarioController::class, 'delete']);
Route::delete('empresas/{id}', [EmpresaController::class, 'delete']);

// Rotas Empresas
Route::get('empresas', [EmpresaController::class, 'index']);
Route::get('empresas/{id}', [EmpresaController::class, 'show']);
Route::put('empresas/{id}', [EmpresaController::class, 'update']);
Route::get('empresas/{id}/funcionarios', [EmpresaController::class, 'listFuncionarios']);


//Rotas linhas e viagens 

Route::get('linhas', [LinhasController::class, 'index']);
Route::get('linhas/{id}', [LinhasController::class, 'show']);
Route::get('linhas/{id}/viagens', [LinhasController::class, 'showViagens']);

Route::post('linhas', [LinhasController::class, 'store']);
Route::post('linhas/{id}/viagens', [LinhasController::class, 'addViagensToLinha']);
Route::delete('linhas/{id}', [LinhasController::class, 'delete']);