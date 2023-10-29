<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function createUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),[
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
            ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'message' => 'Usuário Inválido'
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                "message" => "Usuário criado com sucesso",
                "token" => $user->createToken("API_TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 500);
        }
    }

    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'message' => 'E-mail ou senha incorretos',
                ], 401);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'message' => 'E-mail ou senha inválidos',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'message' => 'Logado com sucesso',
                'token' => $user->createToken('API_TOKEN')->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 500);
        }
    }
}
