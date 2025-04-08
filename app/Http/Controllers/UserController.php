<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\SignInRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\User;
class UserController extends Controller
{
    //
    public function signup(CreateUserRequest $request): JsonResponse
    {
        //  register user in database
        $data = $request->only(['name', 'email', 'password', 'state_id']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
    
        $response = [
            'error' => '',
            'token' => $user->createToken('Register_token') -> plainTextToken
        ];
        return response()->json($response);
    }

    public function signin(SignInRequest $request): JsonResponse
    {
        $data = $request->only(['email', 'password']);

        if(Auth::attempt($data)){
            $user = Auth::user();
            $response = [
                'error' => '',
                'token' => $user->createToken('Login_token') -> plainTextToken
            ];
            return response()->json($response);
        }
        return response()->json(['error' => 'Usuario ou Senha Invalido']);
    }

    public function me(): JsonResponse
    {
        // Acessando o usuario logado (teste de autenticacao)
        $user = Auth::user();

        $response = [
            'name'=> $user->name,
            'email'=>$user->email,
            'state'=>$user->state->name,
            'ads'=>$user->advertises  
        ];
        /*
            {
                name,
                email,
                state: nome do estado,
                ads: [ad1, ad2, ad3]
            }        
        */
        return response()->json($response);
    }

}
