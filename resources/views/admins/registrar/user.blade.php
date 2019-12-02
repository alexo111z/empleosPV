@extends('admins.master')
<link href="{{ asset('css/registrar.css') }}" rel="stylesheet">
@section('body')

    <main role="main" class="col-md-12 py-0 px-0">

        <div class="container">
                <div class="py-5 text-center">
                    <h1 class="text-uppercase">Registrar usuario</h1>
                    {{--<p class="lead">Tenemos ofertas de empleo esperandote</p>--}}
                </div>
    
                <form method="POST" action="{{ url('/usuarios/crear') }}">
                {{ csrf_field() }}
    
                <!-- start personal information -->
               <div class="col-md-8 order-md-1">
                    <h4 class="mb-1">Datos de la cuenta</h4>
                    <div class="mb-3">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="" value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="" value="" required>
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
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Apellido</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
                            </div>
                        </div>
    
    
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="Date">Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="date" name="trip-start" value="2000-01-01" min="1960-01-01" max="2002-12-31">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label  for="Date">Sexo</label>
                                    <div class="col-md-2 mb-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="f" name="sexo" value="1" class="custom-control-input">
                                            <label class="custom-control-label" for="f">Femenino</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="custom-control custom-radio">
                                             <input type="radio" id="m" name="sexo" value="0" class="custom-control-input">
                                            <label class="custom-control-label" for="m">Masculino</label>
                                        </div>
                                    </div>
    
                                </div>
                        </div>
                        <hr class="mb-1">
                        <h4 class="mb-1">Formación académica</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Nivel de estudios</label>
                                <select class="form-control" name="estudios">
    
                                    <option selected disabled hidden>Seleccionar....</option>
                                    {{--@foreach($estudios as $estudio)
                                        <option value="{{ $estudio->id }}">{{ $estudio->nivel }}</option>
                                    @endforeach--}}
    
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Área</label>
                                <select class="form-control" name="area">
    
                                    <option selected disabled hidden>Seleccionar....</option>
                                    {{--@foreach($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->area }}</option>
                                    @endforeach--}}
    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8 order-md-1">
                            <button class="btn btn-register btn-lg btn-block" type="submit">Registrar cuenta</button>
                        </div>
    
                    </form>
                    </div>
                </form>
    
            </div>
    </main>

@endsection
