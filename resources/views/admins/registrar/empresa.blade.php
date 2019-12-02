@extends('admins.master')
<link href="{{ asset('css/registrar.css') }}" rel="stylesheet">
@section('body')

    <main role="main" class="col-md-12 py-0 px-0">
        
        <div class="container">
                <div class="py-5 text-center">
                    <h1 class="text-uppercase">Registrar nueva empresa</h1>
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
                    <h4 class="mb-1">Datos de la Empresa</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nombre">Nombre (s)</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="RFC">RFC</label>
                                <input type="text" class="form-control" id="RFC" name="RFC" placeholder="" value="" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            </div>
                                <hr class="mb-1">
                                <h4 class="mb-1">Ubicación</h4>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="dfiscal">Dirección fiscal</label>
                                        <input type="text" class="form-control" id="dfiscal" name="dfiscal" placeholder="" value="" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Pais</label>
                                        <select class="form-control" name="pais">
            
                                            <option selected disabled hidden>Seleccionar....</option>
                                            {{--@foreach($estudios as $estudio)
                                                <option value="{{ $estudio->id }}">{{ $estudio->nivel }}</option>
                                            @endforeach--}}
            
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Estado</label>
                                        <select class="form-control" name="estado">
            
                                            <option selected disabled hidden>Seleccionar....</option>
                                            {{--@foreach($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->area }}</option>
                                            @endforeach--}}
            
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                            <label for="lastName">Municipio/Ciudad</label>
                                            <select class="form-control" name="ciudad">
                
                                                <option selected disabled hidden>Seleccionar....</option>
                                                {{--@foreach($areas as $area)
                                                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                                                @endforeach--}}
                
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
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="otro">Otro contacto</label>
                                    <input type="text" class="form-control" id="otro" name="otro" placeholder="" value="" required>
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
