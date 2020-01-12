@extends('admins.master')

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
                       
                        @if(isset($emp->logo))
                            <img class="foto-perfil" src="{{ route('empresas.logo',['file'=>$emp->logo]) }}">
                            <div class="col-md-6 mb-0 text-right mx-auto div-camera">
                                <a data-toggle="modal" data-target="#deletemodal" class="btn-remove mx-1 px-1"><span class="fa fa-trash"></span></a>
                         @else
                                <img class="foto-perfil" src="{{ route('empresas.logo',['file'=>'empresa.png']) }}">
                                <div class="col-md-6 mb-0 text-right mx-auto div-camera">
                        @endif
                                <a data-toggle="modal" data-target="#modal-logo"  class="btn-upload mx-1 px-1"><span class="fa fa-upload"></span></a>
                                <div class="input-group text-center ">
                                    <span class="help-block text-danger mx-auto">{{ $errors->first('errorfoto', ':message') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mx-3 mt-0 pt-2">
                            <h3 class="mb-0">
                                <span>{{$emp->nombre}} </span>
                            </h3>
                            <Span class="text-muted">{{$emp->rsocial->nombre}}</span>
                        </div>
                        <hr class="ml-4 mr-4">
                        <h6 class="my-0 ml-4 text-uppercase">Datos de mi empresa.</h6>
                        <div class="col-md-12 ml-4 pr-5">
                            <Span class="text-muted text-uppercase"><strong>RFC:</strong> {{$emp->rfc}}</span><br>
                            <Span class="text-muted"><strong>Giro:</strong> {{$emp->Giro->giro}}</span><br>
                            
                        </div>
                        <hr class="ml-4 mr-4">
                        <h6 class="my-0 ml-4 text-uppercase">Ubicación</h6>
                        <div class="col-md-12 ml-4 pr-5">
                            <Span class="text-muted"><i class="fas fa-home" ></i> {{$emp->d_fiscal}}</span><br>
                            <Span class="text-muted pl-1"><i class="fa fa-map-marker" ></i> {{$emp->idpais->pais}}, {{$emp->idestado->estado}}, {{$emp->idciudad->municipio}}</span>
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
                            <input id="nombre"  name="nombre" class="form-control" value="{{$emp->nombre}}" required>
                        </div>
                        <div class="ml-4 mb-2">  
                            <label for="giro">Razón  Social</label>
                            <select class="form-control w-100" name="rsocial" id="rsocial" required>
                                @foreach($razones as $razon)
                                    @if($emp->id_social==$razon->id)
                                        <option value="{{ $razon->id }}" selected>{{ $razon->nombre }}</option>
                                    @else
                                        <option value="{{ $razon->id }}">{{ $razon->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="ml-4 mb-2">   
                            <span class="text-muted">RFC</span>
                            <input id="rfc" name="rfc" class="form-control text-uppercase" value="{{$emp->rfc}}" required>
                        </div>
                        <div class="ml-4 mb-2">  
                            <label for="giro">Giro</label>
                            <select class="form-control w-100" name="giro" required>
                                @foreach($giros as $giro)
                                    @if($emp->id_giro==$giro->id)
                                        <option value="{{ $giro->id }}" selected>{{ $giro->giro }}</option>
                                    @else
                                        <option value="{{ $giro->id }}">{{ $giro->giro }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="ml-4 mb-2">   
                            <span class="text-muted">Dirección Fiscal</span>
                            <input id="d_fiscal" name="d_fiscal" class="form-control" value="{{$emp->d_fiscal}}" required>
                        </div>
                        <div class="ml-4 mb-2">   
                        <label for="pais">Pais</label>
                            <select class="form-control" id="CmbPais" name="pais" onchange='funcpais(this.value,<?php echo json_encode($estados); ?>)' name="pais" required>
                                @foreach($paices as $pais)
                                    @if($pais->id == $emp->id_pais)
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
                                    @if($estado->id == $emp->id_estado)
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
                                    @if($ciudad->id == $emp->id_ciudad)
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
                            <span id="LblEmail" class="text-muted"><strong>Nombre de contacto:</strong> {{ $emp->contacto }}</span><bR>
                            <span id="LblEmail" class="text-muted text-lowercase"><i class="fa fa-envelope"></i> {{ $emp->email }}</span><bR>
                            <span id="LblTel"class="text-muted"> <i class="fa fa-phone"></i>
                            @if($emp->telefono == null)
                                Agrega tu número telefónico
                            @else
                                {{$emp->telefono}}
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
                            <input type="text" class="form-control col-sm-6 mt-2" id="contacto" name="contacto" placeholder="" value="{{ $emp->contacto }}" required>
                            <br><span class="text-muted mt-2">Correo electrónico (no se puede cambiar)</span>
                            <input type="text" class="form-control col-sm-6 mt-2 text-lowercase" id="email" name="email" placeholder="" value="{{ $emp->email }}" disabled required>
                            <span class="text-muted mt-2">Número telefónico</span>
                            <input type="text" class="form-control col-sm-3 mt-2" id="telefono" name="telefono" placeholder="Ej. 3221234567" value="{{ $emp->telefono }}" required>
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
                    
                    <div class="mr-4 ml-4 mb-5">
                        <div id="divBaja">
                            <button data-toggle="modal" data-target="#confirmbaja" id="btnBaja" type="button" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Dar de baja esta cuenta</button><br>
                            <span class="text-danger col-sm-12 pl-0"><i class="fa fa-info-circle" aria-hidden="true"></i> Esta opción le permite dar de baja la cuenta, sin embargo una vez dada de baja ya no sera posible ingresar a esta cuenta.</span>
                        </div>
                        <div id="divBaja2" class="col-sm-12 pl-0 ml-0">
                        <h5>Dar de baja mi cuenta</h5>
                        <form  id="verificarpassword" name="verificarpassword" method="POST" action="{{route('verificarpassword')}}">
                            {{ csrf_field() }}
                            <div class="col-md-7 ml-0 pl-0">
                                <label>Introducir contraseña para dar de baja su cuenta</label>
                                <input type="password" class="form-control" id="confirmpass" name="confirmpass" placeholder="" value="" required>
                                <span id="error-confirm" class="help-block text-danger mx-auto"></span>
                            </div>
                            <div  class="text-right col-sm-12 mt-3" >
                                <button id="cancelar-Baja" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button id="btn-confirmbaja" type="submit" class="btn btn-danger ">Dar de baja mi cuenta</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade text-center" id="modal-logo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Subir Logo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="subirFoto" action="{{route('subirLogo')}}" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
            <div class="modal-body">
                    <img id="modal-foto" class="foto-perfil" src="{{ route('empresas.logo',['file'=>'empresa.png']) }}">
                    <input class="pt-2" required type="file" id="foto" name="foto" accept="image/png,image/jpeg,image/jpg">
                <div class="input-group text-center ">
                    <span id="msjimg" class="help-block text-danger mx-auto"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="btnFoto" class="btn btn-info" type="submit" ><i class="fas fa-upload"></i> Subir</button>
                
            </div>
            </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> ¿Desea eliminar la foto de perfil?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="subirFoto" action="{{route('borrarlogo')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="btnFoto" class="btn btn-info" type="submit" ><i class="fa fa-trash" aria-hidden="true"></i> Eliminar foto</button>  
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="aviso-pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-success text-center py-3" id="exampleModalLabel"><i class="fa fa-check" aria-hidden="true"></i> Su contraseña fue cambiada con éxito.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button id="btn-aviso" class="btn btn-info" type="submit" >Aceptar</button>  
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirmbaja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> ¿Esta seguro que desea dar de baja esta cuenta?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="text-danger"><i class="fas fa-info-circle"></i>Una vez que se da de baja la cuenta ya no sera posible ingresar a está.</span>
            </div>
            <form id="deleteemp" action="{{ route('admin.delete.emp', $emp->id) }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button  class="btn btn-danger" type="submit" ><i class="fa fa-trash" aria-hidden="true"></i> Dar de baja</button>  
                </div>
            </form>
        </div>
    </div>
</div>
</main>

@endsection
@section('scripts')

    <script src="{{asset('js/perfil-emp.js')}}"> </script>
@endsection