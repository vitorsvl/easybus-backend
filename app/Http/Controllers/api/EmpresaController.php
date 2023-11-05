<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FuncionarioResource;
use App\Http\Resources\LinhaResource;
use Illuminate\Http\Request;

use App\Models\Empresa;
use App\Models\Linha;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        return Empresa::all(); // retorna todas as empresas (get)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {   
        // dd($request->cnpj);
        $empresa = Empresa::create($request->all());
	
        return response(["id" => $empresa->id], 201);
    }

    /**
     * Display the specified resource.
     */
    public function getOne(string $id)
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

    // retorna todos os funcionarios de uma empresa
    public function getFuncionarios($id) {

        $empresa = Empresa::with('funcionarios')->findOrFail($id);

        $funcionarios = $empresa->funcionarios; 
        return FuncionarioResource::collection($funcionarios);
    }

    public function getLinhas($id) {
        $empresa = Empresa::with('linhas.viagens.paradas')->findOrFail($id);

        $linhas = $empresa->linhas; 
        
        $linhasResource =  LinhaResource::collection($linhas);
        return $linhasResource->response()->getData(true)['data'];
    }
}
