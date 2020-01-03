<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class UserForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function broker()
    {
      return Password::broker('users');
    }
    public function showLinkRequestForm()
    {
        return view('usuarios.passwords.email');
    }
}
