<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FuncionarioResource;
use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::with('user')->get();
        return FuncionarioResource::collection($funcionarios);
    }

    public function store(Request $request)
    {
        // cria um usuário
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Crie um novo funcionário relacionado a esse usuário
        $funcionario = Funcionario::create([
            'user_id' => $user->id,
            'cpf' => $request->input('cpf'),
            'empresa_id' => $request->input('empresa_id')
        ]);

        return response("[OK] funcionario $funcionario->name cadastrado!", 200);
    }

    public function show(string $id)
    {
        $f = Funcionario::with('user')->findOrFail($id);
        // dd($f->toArray());
        return new FuncionarioResource($f);
        // return $f;  
    }

    public function update(Request $request, string $id)
    {
       //
    }

    public function delete(string $id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();

        return response("[DELETED $funcionario->nome]", 200);
    }
}

