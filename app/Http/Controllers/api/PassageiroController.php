<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use App\Models\Passageiro;
use App\Models\User;
use Illuminate\Http\Request;

class PassageiroController extends Controller
{
    public function getAll()
    {
        return Passageiro::all();
    }

    public function create(Request $request)
    {
        dd($request);
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

        // Crie um novo admin relacionado a esse usuário
        $admin = Administrador::create([
            'user_id' => $user->id
        ]);

        return $user->createToken('authToken')->plainTextToken;

    }

    public function getOne(string $id)
    {
        return Passageiro::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
