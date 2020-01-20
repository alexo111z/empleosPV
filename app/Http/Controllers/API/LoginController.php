<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login']]);
    }


    function login(Request $request){
        
        $a = json_decode($request->getContent(), true);
        $mail = $a['email'];
        $pass = $a['password'];
        $credentials = [
            'email' => $mail,
            'password' => $pass
        ];
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Usuario y/o contraseña invalidos.'], 401);
        }
    
        return $this->respondWithToken($token);
    }

    public function refresh(){
        return $this->respondWithToken(auth('api')->refresh());
    }

    public function logout(){
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'id' => auth('api')->user()->id,
            'nombre' => auth('api')->user()->nombre,
            'apellido' => auth('api')->user()->apellido,
            'email' => auth('api')->user()->email,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function perfil(){
        return response()->json(auth('api')->user());
    }

}
