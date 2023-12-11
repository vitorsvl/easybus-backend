<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{   
    public function getAll()
    {
        $admins = Administrador::with('user')->get();
        return $admins;
    }
    public function create(Request $request) 
    {
         // cria um usuário
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
}
