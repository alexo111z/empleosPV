@extends('master')
@section('body')

    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <main role="main">
        <div class="container mb-2">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="form-title text-center align-middle">
                        <h1 class="text-uppercase">Inicio de sesión</h1>
                        <h6>Ingresa y encuentra el empleo que deseas</h6>
                    </div>
                    <div class="d-flex justify-content-center form_container">

                        <form class="form-signin" method="post" action="{{ route('usuarios.sesion') }}">
                            {{ csrf_field() }}
                            <div class="input-group text-center ">
                                <span class="help-block text-danger mx-auto">{{ $errors->first('error', ':message') }}</span>
                            </div>
                            <div class="input-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                                <input type="text" id="email" name="email" class="form-control" value="{{ old('email' ) }}" placeholder="Correo electrónico">
                            </div>
                            <div class="input-group text-center mb-3 ">
                                <span class="help-block text-danger mx-auto">{{ $errors->first('email', ':message') }}</span>
                            </div>
                            <div class="input-group mb-2 {{ $errors->has('password') ? 'has-error' : '' }}">
                                <input type="password" id="password" name="password" class="form-control" value="" placeholder="Contraseña">
                            </div>
                            <div class="input-group text-center mb-2 ">
                                <span class="help-block text-danger mx-auto">{{ $errors->first('password', ':message') }}</span>
                            </div>

                            <div class="form-group text-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" >
                                    <label class="custom-control-label" for="customCheck">Mantener sesión iniciada</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" name="button" class="btn login_btn">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>

                    <div class="mt-4">
                        <div class="link-password">
                            <a href="#">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                            <p>Si no tienes cuenta </p> <a href="{{route('usuarios.registrar')}}" class="ml-2">Registrate Aquí</a>
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
