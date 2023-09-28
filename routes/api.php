<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Route;


// ROTAS EXCLUSIVAS DO ADM
Route::post('empresas', [EmpresaController::class, 'create']);
Route::post('funcionarios', [FuncionarioController::class, 'create']);
Route::get('funcionarios', [FuncionarioController::class, 'getAll']);
Route::get('funcionarios/{id}', [FuncionarioController::class, 'getOne']);
Route::delete('funcionarios/{id}', [FuncionarioController::class, 'delete']);
Route::delete('empresas/{id}', [EmpresaController::class, 'delete']);

// Rotas Empresas
Route::get('empresas', [EmpresaController::class, 'getAll']);
Route::get('empresas/{id}', [EmpresaController::class, 'getOne']);
Route::put('empresas/{id}', [EmpresaController::class, 'update']);
Route::get('empresas/{id}/funcionarios', [EmpresaController::class, 'getFuncionarios']);
Route::get('empresas/{id}/linhas', [EmpresaController::class, 'getLinhas']);



//Rotas linhas e viagens 

Route::get('linhas', [LinhasController::class, 'getAll']);
Route::get('linhas/{id}', [LinhasController::class, 'getOne']);
Route::get('linhas/{id}/viagens', [LinhasController::class, 'showViagens']);

Route::post('linhas', [LinhasController::class, 'create']);
Route::post('linhas/{id}/viagens', [LinhasController::class, 'addViagensToLinha']);
Route::delete('linhas/{id}', [LinhasController::class, 'delete']);