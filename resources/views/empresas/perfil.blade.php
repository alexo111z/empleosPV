@extends('empresas.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{asset('css/perfil.css')}}" rel="stylesheet">

@section('body')

        
        <main role="main">
            <div class="container px-auto">
                <div class="row px-auto">
                    <div class="information-personal col-md-4 order-md-1 mx-auto mt-4 mb-0">
                        <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 pt-4 shadow-sm h-md-250 position-relative">
                            <div id="Datos">
                                <div class="text-center mx-auto" >
                               
                                @if(isset(auth()->guard('empresa')->user()->logo))
                                    <img class="foto-perfil" src="{{ route('empresas.logo',['file'=>auth()->guard('empresa')->user()->foto]) }}">
                                    <div class="col-md-6 mb-0 text-right mx-auto div-camera">
                                        <a data-toggle="modal" data-target="#deletemodal" class="btn-remove mx-1 px-1"><span class="fa fa-trash-o"></span></a>
                                 @else
                                        <img class="foto-perfil" src="{{ route('empresas.logo',['file'=>'empresa.png']) }}">
                                        <div class="col-md-6 mb-0 text-right mx-auto div-camera">
                                @endif
                                        <a data-toggle="modal" data-target="#exampleModal"  class="btn-upload mx-1 px-1"><span class="fa fa-upload"></span></a>
                                        <div class="input-group text-center ">
                                            <span class="help-block text-danger mx-auto">{{ $errors->first('errorfoto', ':message') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mx-3 mt-0 pt-2">
                                    <h3 class="mb-0">
                                        <span>{{auth()->guard('empresa')->user()->nombre}} </span>
                                    </h3>
                                    <Span class="text-muted">{{auth()->guard('empresa')->user()->rsocial->nombre}}</span>
                                </div>
                                <hr class="ml-4 mr-4">
                                <h6 class="my-0 ml-4 text-uppercase">Datos de mi empresa.</h6>
                                <div class="col-md-12 ml-4 pr-5">
                                    <Span class="text-muted text-uppercase"><strong>RFC:</strong> {{auth()->guard('empresa')->user()->rfc}}</span><br>
                                    <Span class="text-muted"><strong>Giro:</strong> {{auth()->guard('empresa')->user()->Giro->giro}}</span><br>
                                    
                                </div>
                                <hr class="ml-4 mr-4">
                                <h6 class="my-0 ml-4 text-uppercase">Ubicación</h6>
                                <div class="col-md-12 ml-4 pr-5">
                                    <Span class="text-muted"><i class="fas fa-home" ></i> {{auth()->guard('empresa')->user()->d_fiscal}}</span><br>
                                    <Span class="text-muted pl-1"><i class="fa fa-map-marker" ></i> {{auth()->guard('empresa')->user()->idpais->pais}}, {{auth()->guard('empresa')->user()->idestado->estado}}, {{auth()->guard('empresa')->user()->idciudad->municipio}}</span>
                                </div>
                                <div class="text-right ">
                                    <button type="button "id="BtnEditarDatos"  class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                                </div>
                            </div>
                            <div id="Datos2">
                            <form id="form-Datos"  method="post" action="{{ route('empresas.datos') }}">
                            {{ csrf_field() }}
                                <h6 class="text-uppercase ml-3">Modificar datos de mi empresa</h6>
                                <div class="ml-4 mb-2">   
                                    <span class="text-muted">Nombre</span>
                                    <input id="nombre"  name="nombre" class="form-control" value="{{auth()->guard('empresa')->user()->nombre}}" required>
                                </div>
                                <div class="ml-4 mb-2">  
                                    <label for="giro">Razón  Social</label>
                                    <select class="form-control w-100" name="rsocial" id="rsocial" required>
                                        @foreach($razones as $razon)
                                            @if(auth()->guard('empresa')->user()->id_razon==$razon->id)
                                                <option value="{{ $razon->id }}" selected>{{ $razon->nombre }}</option>
                                            @else
                                                <option value="{{ $razon->id }}">{{ $razon->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="ml-4 mb-2">   
                                    <span class="text-muted">RFC</span>
                                    <input id="rfc" name="rfc" class="form-control text-uppercase" value="{{auth()->guard('empresa')->user()->rfc}}" required>
                                </div>
                                <div class="ml-4 mb-2">  
                                    <label for="giro">Giro</label>
                                    <select class="form-control w-100" name="giro" required>
                                        @foreach($giros as $giro)
                                            @if(auth()->guard('empresa')->user()->id_giro==$giro->id)
                                                <option value="{{ $giro->id }}" selected>{{ $giro->giro }}</option>
                                            @else
                                                <option value="{{ $giro->id }}">{{ $giro->giro }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="ml-4 mb-2">   
                                    <span class="text-muted">Dirección Fiscal</span>
                                    <input id="d_fiscal" name="d_fiscal" class="form-control" value="{{auth()->guard('empresa')->user()->d_fiscal}}" required>
                                </div>
                                <div class="ml-4 mb-2">   
                                <label for="pais">Pais</label>
                                    <select class="form-control" id="CmbPais" name="pais" onchange='funcpais(this.value,<?php echo json_encode($estados); ?>)' name="pais" required>
                                        @foreach($paices as $pais)
                                            @if($pais->id == auth()->guard('empresa')->user()->id_pais)
                                            <option value="{{ $pais->id }}" selected>{{ $pais->pais }}</option>
                                            @else
                                                <option value="{{ $pais->id }}">{{ $pais->pais }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="ml-4 mb-2">   
                                <label for="pais">Estado</label>
                                    <select id="CmbEstado" onchange='funcestado(this.value,<?php echo json_encode($municipios); ?>)' class="form-control" name="estado" required>
                                        @foreach($estados as $estado)
                                            @if($estado->id == auth()->guard('empresa')->user()->id_estado)
                                                <option value="{{ $estado->id }}" selected>{{ $estado->estado }}</option>
                                            @else
                                                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="ml-4 mb-2">   
                                <label for="ciudad">Municipio/Ciudad</label>
                                    <select id="CmbCiudad" class="form-control" name="ciudad" required>
                                        @foreach($municipios as $ciudad)
                                            @if($ciudad->id == auth()->guard('empresa')->user()->id_ciudad)
                                                <option value="{{ $ciudad->id }}" selected>{{ $ciudad->municipio }}</option>
                                            @else
                                                <option value="{{ $ciudad->id }}">{{ $ciudad->municipio }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-right ">
                                    <button type="button" id="BtnCancelarDatos"  class="form-inline icon btn btn-secondary text-secondary">Cancelar</button>
                                    <button type="submit" id="BtnGuardarDatos"  class="form-inline icon btn btn-primary text-primary">Guardar</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!--*************************************************************************************************************-->
                    <div class="profesional-information col-md-7 order-md-2 mx-auto mt-4">
                        <div class="no-gutters border rounded overflow-hidden flex-md-row shadow-sm h-md-250" novalidate>
                            <h4 class=" ml-4  my-3 ">Información de contacto</h4>
                            <div class="row mr-4 ml-4">
                                <div class="col-sm-12" id="DivContacto">
                                    <span id="LblEmail" class="text-muted"><strong>Nombre de contacto:</strong> {{ auth()->guard('empresa')->user()->contacto }}</span><bR>
                                    <span id="LblEmail" class="text-muted text-lowercase"><i class="fa fa-envelope"></i> {{ auth()->guard('empresa')->user()->email }}</span><bR>
                                    <span id="LblTel"class="text-muted"> <i class="fa fa-phone"></i>
                                    @if(auth()->user()->telefono == null)
                                        Agrega tu número telefónico
                                    @else
                                        {{auth()->guard('empresa')->user()->telefono}}
                                    @endif
                                    </span><br>
                                    <div class="text-right mt-2">
                                        <button id="BtnEditarContacto" type="button " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                                    </div>
                                </div>
                                <div id="DivContacto2" class="col-sm-12 ml-3">
                                <form id="form-Contacto"  method="post" action="{{ route('empresas.contacto') }}">
                                {{ csrf_field() }}
                                    <span class="text-muted mt-2">Nombre de Contacto</span>
                                    <input type="text" class="form-control col-sm-6 mt-2" id="contacto" name="contacto" placeholder="" value="{{ auth()->user()->contacto }}" required>
                                    <br><span class="text-muted mt-2">Correo electrónico (no se puede cambiar)</span>
                                    <input type="text" class="form-control col-sm-6 mt-2 text-lowercase" id="email" name="email" placeholder="" value="{{ auth()->user()->email }}" disabled required>
                                    <span class="text-muted mt-2">Número telefónico</span>
                                    <input type="text" class="form-control col-sm-3 mt-2" id="telefono" name="telefono" placeholder="Ej. 3221234567" value="{{ auth()->user()->telefono }}" required>
                                    <div class="text-right mt-2">
                                        <button type="button" id="BtnCancelarContacto"  class="form-inline icon btn btn-secondary text-secondary">Cancelar</button>
                                        <button id="BtnGuardarContacto" type="submit"   class=" form-inline icon btn btn-primary text-primary ">Guardar</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="no-gutters mt-4 border rounded overflow-hidden flex-md-row shadow-sm h-md-250" novalidate>
                            <h4 class=" ml-4  mt-3 mb-4 ">Opciones de cuenta</h4>
                            <div class="row mr-4 ml-4 mb-4">
                                <button type="button" class="btn btn-outline-info"><i class="fa fa-key" aria-hidden="true"></i> Cambiar contraseña</button>
                                <span class="text-info col-sm-12 pl-0"><i class="fa fa-info-circle" aria-hidden="true"></i> Esta opción le permite cambiar su contraseña actual por una nueva.</span>
                            </div>
                            <hr class="ml-4 mr-4">
                            <div class="row mr-4 ml-4 mb-5">
                                <button type="button" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Dar de baja mi cuenta</button><br>
                                <span class="text-danger col-sm-12 pl-0"><i class="fa fa-info-circle" aria-hidden="true"></i> Esta opción le permite dar de baja su cuenta, sin embargo una vez dada de baja ya no podrá ingresar a esta cuenta.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
@endsection
@section('scripts')

   <script src="{{asset('js/perfil-emp.js')}}"> </script>
@endsection