<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LinhaResource;
use App\Http\Resources\ViagemResource;
use App\Models\Linha;
use Illuminate\Http\Request;

class LinhasController extends Controller
{
    public function getAll()
    {
        $linhas = Linha::with('viagens.paradas')->get();
        $linhasResource =  LinhaResource::collection($linhas);
        return $linhasResource->response()->getData(true)['data'];
        // return Linha::all();
    }
    
    public function getBySearch(Request $request) 
    {   
        $search = $request->input('search');

        $linhas = Linha::with('viagens.paradas')
            ->where('cidade_origem', 'LIKE', "%$search%")
            ->orWhere('cidade_destino', 'LIKE', "%$search%")
            ->get();

        return $linhas;
    }

    public function create(Request $request)
    {
        $linhaData = [
            'cidade_origem' => $request->input('cidade_origem'),
            'cidade_destino' => $request->input('cidade_destino'),
            'empresa_id' => $request->input('empresa_id')
        ];
        
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

    public function getOne(string $id)
    {
        $linha = Linha::with('viagens.paradas')->findOrFail($id);
        // dd($linha);
        $linhaResource =  new LinhaResource($linha);

        return $linhaResource->response()->getData(true)['data'];
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
        dd($viagensData);

        foreach ($viagensData as $viagemData) {
            $linha->viagens()->create($viagemData);
            # não está adicionando as paradas
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

