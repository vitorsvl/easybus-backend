<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        return Funcionario::all();
    }

    public function store(Request $request)
    {
        Funcionario::create($request->all());

        return response("[OK]", 200);
    }

    public function show(string $id)
    {
        return Funcionario::findOrFail($id);
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

