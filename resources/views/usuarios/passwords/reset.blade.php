@extends('master')
<link href="{{asset('css/login.css')}}" rel="stylesheet">
@section('body')
<main role="main" class="col-md-12 py-0 px-0">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="user_card">
                <div class="form-title text-center align-middle">
                    <h1 class="text-uppercase">Reestablecer contraseña</h1>
                    <h6>Ingresa tu correo electrónico y tu nueva contraseña.</h6>
                </div>
                <div class="d-flex justify-content-center form_container">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="form-signin" method="post" action="{{ route('user.password.request') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="input-group px-0 mx-0 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 ml-0 pl-0  control-label">Correo electrónico</label>
                            <div class="col-md-12 mx-0 px-0">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email }}" required autofocus>
                                @if ($errors->has('email'))
                                    <div class="input-group text-center mb-3 ">
                                        <span class="help-block text-danger mx-auto">{{ $errors->first('email') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="input-group px-0 mx-0 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 mx-0 px-0  control-label">Nueva contraseña</label>

                            <div class="col-md-12 mx-0 px-0">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <div class="input-group text-center mb-3 ">
                                    <span class="help-block text-danger mx-auto">{{ $errors->first('password') }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="input-group px-0 mx-0 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-12 px-0 mx-0  control-label">Confirmar contraseña</label>
                            <div class="col-md-12 px-0 mx-0 ">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                <div class="input-group text-center mb-3 ">
                                    <span class="help-block text-danger mx-auto">{{ $errors->first('password_confirmation') }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mx-0 px-0 mt-3 login_container">
                            <button type="submit" class="btn login_btn">
                                Reestablecer contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<main role="main">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
@section('scripts')
    <script src="{{asset('js/login.js')}}"> </script>
@endsection