<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LinhaResource;
use App\Http\Resources\ViagemResource;
use App\Models\Linha;
use Illuminate\Http\Request;

class LinhasController extends Controller
{
    public function index()
    {
        // $linhas = Linha::with('viagens.paradas')->get();
        // return LinhaResource::collection($linhas);
        return Linha::all();
    }

    public function store(Request $request)
    {
        $linhaData = [
            'cidade_origem' => $request->input('cidade_origem'),
            'cidade_destino' => $request->input('cidade_destino'),
            'empresa_id' => $request->input('empresa_id')
        ];
        // $linhaData = $request->only(['cidade_origem', 'cidade_destino']);
        dd($request->toArray()); 
        $viagensData = $request->input('viagens');
        
        // dd($linhaData);
        $linha = Linha::create($linhaData); # criando a linha

        foreach ($viagensData as $viagemData) { # adicionando as viagens 
            $viagem = $linha->viagens()->create($viagemData);

            $paradasData = $viagemData['paradas'];

            foreach ($paradasData as $paradaData) {
                $viagem->paradas()->create($paradaData);
            }
        }
        return response("[OK]", 200);
    }

    public function show(string $id)
    {
        $linha = Linha::with('viagens.paradas')->findOrFail($id);
        return new LinhaResource($linha);
    }

    public function update(Request $request, string $id)
    {
       //
    }

    public function delete(string $id)
    {
        $linha = Linha::findOrFail($id);
        $linha->delete();

        return response("[DELETED", 200);
    }

    # action para adicionar viagens a uma linha existente 
    public function addViagensToLinha(Request $request, $id)
    {
        $linha = Linha::findOrFail($id);
        $viagensData = $request->input('viagens');
        // dd($viagensData);

        foreach ($viagensData as $viagemData) {
            $linha->viagens()->create($viagemData);
        }

        return response()->json(['message' => 'Viagens adicionadas à linha com sucesso']);
    }

    public function showViagens($id) 
    {
        $linha = Linha::with('viagens')->findOrFail($id);
        // dd($linha->toArray());
        $viagens = $linha->viagens;
        
        return ViagemResource::collection($viagens);
    }
}


# os relacionamentos não estao funcionando. 