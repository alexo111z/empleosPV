@extends('empresas.master')
<link href="{{ asset('css/registrar.css') }}" rel="stylesheet">
@section('body')

    <main role="main" class="col-md-12 mt-2 py-0 px-0">
        
        <div class="container">
                <div class="py-5 text-center">
                    <h1 class="text-uppercase">Registrar nueva empresa</h1>
                    {{--<p class="lead">Tenemos ofertas de empleo esperandote</p>--}}
                </div>
                {!! Form::open(array('route'=>'empresas.crear','method'=>'POST', 'id'=>'registro-empresa')) !!}
                <form class="needs-validation primary" novalidate>
                {{ csrf_field() }}
    
                <!-- start personal information -->
               <div class="col-md-8 order-md-1">
                    <h4 class="mb-1">Datos de la cuenta</h4>
                    <div class="mb-3">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" id="email" name="email" placeholder="you@example.com" value="{{ old('email') }}" required>
                    </div>
                    <div class="input-group text-center mb-3 ">
                                <span class="help-block text-danger mx-auto">{{ $errors->first('email', ':message') }}</span>
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
                    <h4 class="mb-1">Datos de la Empresa</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nombre">Nombre de la empresa</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej. Tacos Perlita" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="RFC">RFC</label>
                                <input type="text" class="form-control text-uppercase" id="RFC" name="RFC" value="{{ old('RFC') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="giro">Giro</label>
                                <select class="form-control" name="giro" required>
                                    @if ( old('giro') == '' )
                                        <option selected disabled hidden>Seleccionar....</option>
                                    @else
                                        <option selected value="{{ old('giro') }}" hidden>{{ $giros[old('giro')-1]->giro }}</option>
                                    @endif
                                    @foreach($giros as $giro)
                                        <option value="{{ $giro->id }}">{{ $giro->giro }}</option>
                                    @endforeach
    
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="razon">Razon Social</label>
                                <select class="form-control" name="razon" required>
                                    @if ( old('razon') == '' )
                                        <option selected disabled hidden>Seleccionar....</option>
                                    @else
                                        <option selected value="{{ old('razon') }}" hidden>{{ $razones[old('razon')-1]->nombre }}</option>
                                    @endif
                                    @foreach($razones as $razon)
                                        <option value="{{ $razon->id }}">{{ $razon->nombre }}</option>
                                    @endforeach
    
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            </div>
                                <hr class="mb-1">
                                <h4 class="mb-1">Ubicación</h4>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="dfiscal">Dirección fiscal</label>
                                        <input type="text" class="form-control" id="dfiscal" name="dfiscal" value="{{ old('dfiscal') }}" placeholder="Calle número colonia" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pais">Pais</label>
                                        <select class="form-control" id="CmbPais"  onchange='funcpais(this.value,<?php echo json_encode($estados); ?>)' name="pais" required>
            
                                            @if ( old('pais') == '' )
                                                <option selected disabled hidden>Seleccionar....</option>
                                            @else
                                                <option selected value="{{ old('pais') }}" hidden>{{ $paices[old('pais')-1]->pais }}</option>
                                            @endif
                                            @foreach($paices as $pais)
                                                <option value="{{ $pais->id }}">{{ $pais->pais }}</option>
                                            @endforeach
            
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="estado">Estado</label>
                                        <select id="CmbEstado" onchange='funcestado(this.value,<?php echo json_encode($municipios); ?>)' class="form-control" name="estado" required>
            
                                            @if ( old('estado') == '' )
                                                <option selected disabled hidden>Seleccionar....</option>
                                            @else
                                                <option selected value="{{ old('estado') }}" hidden>{{ $estados[old('estado')-1]->estado }}</option>
                                            @endif
                                            @foreach($estados as $estado)
                                                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                                            @endforeach
            
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                            <label for="ciudad">Municipio/Ciudad</label>
                                            <select id="CmbCiudad" class="form-control" name="ciudad" required>
                
                                                @if ( old('ciudad') == '' )
                                                    <option selected disabled hidden>Seleccionar....</option>
                                                @else
                                                    <option selected value="{{ old('ciudad') }}" hidden>{{ $municipios[old('ciudad')-1]->municipio }}</option>
                                                @endif
                                                @foreach($municipios as $ciudad)
                                                    <option value="{{ $ciudad->id }}">{{ $ciudad->municipio }}</option>
                                                @endforeach
                
                                            </select>
                                        </div>
                                </div>
    
                        <div class="row">
                        </div>
                            <hr class="mb-1">
                            <h4 class="mb-1">Información de contacto</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="otro">Otro contacto</label>
                                    <input type="text" class="form-control" id="otro" name="otro" value="{{ old('otro') }}">
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
    <script src="{{asset('js/registrar-empresa.js')}}"> </script>
@endsection