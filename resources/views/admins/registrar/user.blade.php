@extends('admins.master')
<link href="{{ asset('css/registrar.css') }}" rel="stylesheet">
@section('body')

    <main role="main" class="col-md-12 py-0 px-0">

        <div class="container">
                <div class="py-5 text-center">
                    <h1 class="text-uppercase">Registrar usuario</h1>
                    {{--<p class="lead">Tenemos ofertas de empleo esperandote</p>--}}
                </div>
                {!! Form::open(array('route'=>'admin.c.user','method'=>'POST', 'id'=>'form-registro')) !!}
                <form class="needs-validation primary">
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
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password2">Confirmar contraseña</label>
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
                                <input type="text" class="form-control" id="lastName" name="lastName" value="{{ old('lastName') }}" required>
                            </div>
                        </div>
    
    
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="Date">Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="date" name="trip-start" value="{{ old('trip-start')==''?'2000-01-01': old('trip-start') }}" min="1960-01-01" max="2002-12-31" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label  for="sexo">Sexo</label>
                                    <div class="col-md-2 mb-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="f" name="sexo" value="1" class="custom-control-input" checked>
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
                                <select class="form-control" name="estudios" required>
    
                                    @if ( old('estudios') == '' )
                                        <option selected disabled hidden>Seleccionar....</option>
                                    @else
                                        <option selected value="{{ old('estudios') }}" hidden>{{ $estudios[old('estudios')-1]->nivel }}</option>
                                    @endif
                                    @foreach($estudios as $estudio)
                                        <option value="{{ $estudio->id }}">{{ $estudio->nivel }}</option>
                                    @endforeach
    
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Área</label>
                                <select class="form-control" name="area" required>
    
                                    @if ( old('area') == '' )
                                        <option selected disabled hidden>Seleccionar....</option>
                                    @else
                                        <option selected value="{{ old('area') }}" hidden>{{ $areas[old('area')-1]->area }}</option>
                                    @endif
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->area }}</option>
                                    @endforeach
    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8 order-md-1">
                            <button class="btn btn-register btn-lg btn-block" type="submit">Registrar cuenta</button>
                        </div>
    
                    </form>
                    </div>
                </form>
                {!! Form::close() !!}
            </div>
    </main>

@endsection
@section('scripts')
    <script src="{{asset('js/registrar-usuarios.js')}}"> </script>
@endsection
