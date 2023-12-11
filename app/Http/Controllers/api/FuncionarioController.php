<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FuncionarioResource;
use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function getAll()
    {
        $funcionarios = Funcionario::with('user')->get();
        $fResource = FuncionarioResource::collection($funcionarios);
        return $fResource->response()->getData(true)['data'];
    }   

    public function create(Request $request)
    {
        # validando as credenciais
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

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

        // dd($funcionario);

        return $user->createToken('authToken')->plainTextToken;
    }

    public function getOne(string $id)
    {
        $f = Funcionario::with('user')->findOrFail($id);
        // dd($f->toArray());
        $fResource = new FuncionarioResource($f);
        // dd($fResource);
        return $fResource->response()->getData(true)['data'];
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

