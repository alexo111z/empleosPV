@extends('master')
<link href="{{asset('css/login.css')}}" rel="stylesheet">
@section('body')
<main role="main">
    <div class="container">
        <div class="d-flex justify-content-center">
        <div class="user_card">
            <div class="form-title text-center align-middle">
                <h1 class="text-uppercase">¿Olvidaste tu contraseña?</h1>
                <h6>Introduce tu correo electrónico para poder reestablecer tu contraseña.</h6>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-signin" role="form" method="POST" action="{{ route('user.password.email') }}">
                {{ csrf_field() }}
                <div class="input-group px-0 mx-0 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-12 ml-0 pl-0  control-label">Correo electrónico.</label>
                    <div class="col-md-12 px-0 mx-0">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                        <div class="input-group text-center mb-3 ">
                            <span class="help-block text-danger mx-auto">{{ $errors->first('email', ':message') }}</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-center mx-0 px-0 mt-3 login_container">
                        <button type="submit" class="btn login_btn">
                            Enviar link para reestablecer contraseña
                        </button>

                </div>
            </form>
        </div>
    </div>
    </div>
</main>
@endsection
