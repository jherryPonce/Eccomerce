<?php

namespace App\Http\Controllers;

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

        //CREO LAS VALIDACIONES
        $attrs = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6',
            //   'Dni' => 'required|string|max:9', 

        ]);

        if ($attrs->fails()) return response()->json(["success" => false, "message" => "DEBE CORREGIR LAS SIGUIENTES VALIDACIONES. ", "error" => $attrs->errors()->all()],Controller::HTTP_WARNING);
       
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'user' => $user,
            'access_token' => $user->createToken('secret')->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }


    public function login(Request $request)
    {

        $attrs = $request->validate([

            'email' => 'required|email',
            'password' => 'required'

        ]);

        if (!Auth::attempt($attrs)) {
            return response()->json([
                'message' => 'Invalid credentials.'
            ], 403);
        }

        return response([
            'user' => auth()->user(),
            'access_token' => auth()->user()->createToken('secret')->plainTextToken,
            'token_type' => 'Bearer',
        ], Controller::HTTP_SUCCESS);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout success.'
        ], Controller::HTTP_SUCCESS);
    }

    public function user()
    {
        return response()->json([
            'user' => auth()->user()
        ], Controller::HTTP_SUCCESS);
    }
}
