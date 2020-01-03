<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth;

class UserResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/perfil';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function guard()
    {
      return Auth::guard('web');
    }

    protected function broker()
    {
      return Password::broker('users');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('usuarios.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
