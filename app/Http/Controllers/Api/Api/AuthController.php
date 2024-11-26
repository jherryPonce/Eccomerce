<?php

namespace App\Http\Controllers\Api\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    public function register(Request $request)
    {
        // Validaciones
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'device_name' => 'required|string',
        ]);

        // Crear usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Asignar rol por defecto
        $user->assignRole('client');

        // Crear token con capacidades
        $token = $user->createToken(
            $validated['device_name'],
            $user->getTokenAbilities() // Asegura control de permisos personalizados
        );

        return response()->json([
            'token' => $token->plainTextToken,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->getRoleNames(),
                'permissions' => $user->getPermissionNames(),
            ],
        ], 201);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'USUARIO O CONTRASEÑA INCORRECCTA'], 403);
        }

        $user = auth()->user();

        // Revocar tokens anteriores del dispositivo
        $user->tokens()->where('name', $request->device_name)->delete();

        // Crear token con capacidades
        $token = $user->createToken(
            $request->device_name,
            $user->getTokenAbilities() // Asignar capacidades desde Spatie
        );

        return response()->json([
            'token' => $token->plainTextToken,
            'token_type' => 'Bearer',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->getRoleNames(),
                'permissions' => $user->getPermissionNames(),
            ],
        ]);
    }


    public function logout(Request $request)
    {
        // Revoca el token actual
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }


    public function user()
    {
        return response()->json([
            'user' => auth()->user()
        ], Controller::HTTP_SUCCESS);
    }
}
