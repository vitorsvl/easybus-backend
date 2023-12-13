<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use App\Models\Passageiro;
use App\Models\User;
use App\Models\Linha;
use Illuminate\Http\Request;
use App\Http\Resources\LinhaResource;

class PassageiroController extends Controller
{
    public function getAll()
    {
        return Passageiro::all();
    }

    public function create(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Crie um novo passageiro relacionado a esse usuário
        $passageiro = Passageiro::create([
            'user_id' => $user->id
        ]);

        return response(["token" => $user->createToken('authToken')->plainTextToken], 201);
    }

    public function getOne(string $id)
    {
        return Passageiro::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $passageiro = Passageiro::findOrFail($id);

        // Validação dos dados recebidos na requisição
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $passageiro->user->id,
        ]);

        $passageiro->user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Adicione mais campos conforme necessário
        ]);
    
        return response("[UPDATED $passageiro->user->name]", 200);
    }

    public function delete($id)
    {
        // Encontrar o passageiro pelo ID
        $passageiro = Passageiro::findOrFail($id);
    
        // Excluir o usuário associado
        $passageiro->user->delete();
    
        // Excluir o próprio passageiro
        $passageiro->delete();
    
        return response("[DELETED $passageiro->user->name]", 200);
    }

    public function getfavoritas($id) 
    {   
        $passageiro = Passageiro::with('user')->whereHas('user', function ($query) use ($id) {
            $query->where('id', $id);
        })->first();
        
        $favoritas = $passageiro->linhasFavoritas->pluck('id')->toArray();

        $linhas_fav = Linha::whereIn('id', $favoritas)->get();

        $linhasResource =  LinhaResource::collection($linhas_fav);
        return $linhasResource->response()->getData(true)['data'];
    }

    public function adicionarFavorita(Request $request, $id) 
    {
        $linhaId = $request->input('linhaId');
        // dd($linhaId, $id);
        $passageiro = Passageiro::with('user')->whereHas('user', function ($query) use ($id) {
            $query->where('id', $id);
        })->first();
        $passageiro->linhasFavoritas()->attach($linhaId); // adiciona à lista de linhas favoritas do passageiro logado

        return response("[OK]", 201);
    }

    public function removerFavorita(Request $request, $id)
    {
        $linhaId = $request->input('linhaId');

        $passageiro = Passageiro::with('user')->whereHas('user', function ($query) use ($id) {
            $query->where('id', $id);
        })->first();
        $passageiro->linhasFavoritas()->detach($linhaId); 

        return response("[OK]", 201);
    }
}
