<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use app\Models\User;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if (auth()->attempt($request->only('email', 'password'))) {
            $user = auth()->user();

            if ($user->administrador) {
                $userType = 0;
            }
            else if ($user->funcionario) {
                $userType = 1;
            }
            else if ($user->passageiro) {
                $userType = 2;
            }
            // Verifica o tipo de usuário e prepara os dados de retorno
            $userData = [
                'user' => $user,
                'token' => $user->createToken('authToken')->plainTextToken,
                'user_type' => $userType,
                // Adicione mais informações do usuário, se necessário
            ];
            // dd($userData);
    
            return response()->json($userData);
        }

        return response('Invalid credentials', 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response('Logged out', 200);
    } 
}
