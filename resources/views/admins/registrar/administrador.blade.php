@extends('admins.master')
<link href="{{ asset('css/admin/regUsuario.css') }}" rel="stylesheet">
@section('body')

    <main role="main" class="col-md-12 py-0 px-0">
        
        <div class="container">
                <div class="py-5 text-center">
                    <h1 class="text-uppercase">Cuenta de Administrador</h1>
                    {{--<p class="lead">Tenemos ofertas de empleo esperandote</p>--}}
                </div>
                {!! Form::open(array('route'=>'admin.c.admin','method'=>'POST', 'id'=>'buscador')) !!}
                <form class="needs-validation primary" novalidate>
                {{ csrf_field() }}
    
                <!-- start personal information -->
               <div class="col-md-8 order-md-1">
                    <h4 class="mb-1">Datos de la cuenta</h4>
                    <div class="mb-3">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{ old('email') }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="password2" name="password2" required>
                        </div>
                    </div>
               </div>

                <hr class="mb-1">
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-1">Información Personal</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Nombre (s)</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="{{ old('firstName') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Apellido</label>
                                <input type="text" class="form-control" id="lastName" name="lastName"  value="{{ old('lastName') }}" required>
                            </div>
                        </div>
                        
                        <div class="col-md-8 order-md-1">
                            <button class="btn btn-register btn-lg btn-block" type="submit">Registrar administrador</button>
                        </div>
    
                    </form>
                    </div>

                </form>
                {!! Form::close() !!}
            </div>
    </main>

@endsection
