<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Empresa::all(); // retorna todas as empresas (get)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Empresa::create($request->all());

        return response("[OK]", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Empresa::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        
        $empresa->nome = $request->nome;
        $empresa->email = $request->email;
        $empresa->telefone = $request->telefone;
        $empresa->cnpj = $request->cnpj;
        $empresa->endereco = $request->endereco;

        $empresa->save();

        return response("[UPDATED]", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();

        return response("[DELETED $empresa->nome]", 200);
    }
}
