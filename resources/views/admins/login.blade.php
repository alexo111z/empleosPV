@extends('admins.master')
<link href="#" rel="stylesheet">

@section('body')

    <main role="main" class="col-md-12 py-0 px-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Administradores</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.login') }}">
                                {{ csrf_field() }}
                                <div class="input-group text-center ">
                                    <span class="help-block text-danger mx-auto">{{ $errors->first('error', ':message') }}</span>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">Correo electrónico</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
                                            </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Iniciar seción
                                        </button>
        
                                        <a class="btn btn-link" href="{{ route('admin.view.preset') }}">
                                            Recuperar contraseña
                                        </a>
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
