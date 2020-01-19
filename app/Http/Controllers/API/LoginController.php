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
    public function login(Request $request){
      // return response()->json(['error' => $request->email]);
       // return response()->json(['error' =>]);
      // $preauth = Auth::check();
       //return response()->json(['error' => $preauth]);
       
       // if (! $token = auth('api')->attempt($credentials)) {
        $user= User::where('email','=',$request->email)->first();
        return response()->json([$user]);
        if (auth('api')->attempt(['email' => $email, 'password' => $password], $remember)) {
            //$posauth = Auth::check();
            //return $this->respondWithToken($token);
            return response()->json(['pre' => 'jali']);
        }else{
            return response()->json(['error' => $request->all()]);
        }
    
        
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
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function perfil(){
        return response()->json(auth('api')->user());
    }

}
