<?php

namespace App\Http\Controllers\api;

use App\Models\Funcionario;
use Illuminate\Support\Facades\Route;



# ROTAS EXCLUSIVAS DO ADM
Route::middleware(['auth:sanctum', 'admin', 'cors'])->group(function () {
    Route::post('empresas', [EmpresaController::class, 'create']);
    Route::post('funcionarios', [FuncionarioController::class, 'create']);
    Route::get('funcionarios', [FuncionarioController::class, 'getAll']);
    Route::delete('funcionarios/{id}', [FuncionarioController::class, 'delete']);
    Route::delete('empresas/{id}', [EmpresaController::class, 'delete']);
    Route::get('empresas/{id}/funcionarios', [EmpresaController::class, 'getFuncionarios']);
});


# ROTAS EXCLUSIVAS DO FUNCIONARIO
Route::middleware(['auth:sanctum', 'funcionario', 'cors'])->group(function () { 
    
    Route::get('funcionarios/{id}', [FuncionarioController::class, 'getOne']);
    Route::put('empresas/{id}', [EmpresaController::class, 'update']);
    Route::get('empresas/{id}/linhas', [EmpresaController::class, 'getLinhas']);
    Route::post('linhas', [LinhasController::class, 'create']);
    Route::post('linhas/{id}/viagens', [LinhasController::class, 'addViagensToLinha']);
    Route::delete('linhas/{id}', [LinhasController::class, 'delete']);
});

# ROTAS EXCLUSIVAS DO PASSAGEIRO
Route::middleware(['auth:sanctum', 'passageiro'])->group(function () {
    # colocar futuramente as rotas de linhas favoritas
});

# ROTAS PÚBLICAS

Route::get('empresas/{id}', [EmpresaController::class, 'getOne']);
Route::get('linhas/buscar', [LinhasController::class, 'getBySearch']);
Route::get('linhas', [LinhasController::class, 'getAll']);
Route::get('linhas/{id}', [LinhasController::class, 'getOne']);
Route::get('linhas/{id}/viagens', [LinhasController::class, 'showViagens']);

Route::middleware(['cors'])->group(function () { 
    Route::post('passageiros', [PassageiroController::class, 'create']);
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('funcionarios', [FuncionarioController::class, 'create']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('empresas', [EmpresaController::class, 'getAll']);

// rota para criar adm ( !!! )
Route::post('admin', [AdminController::class, 'create']);
Route::get('admin', [AdminController::class,'getAll']);