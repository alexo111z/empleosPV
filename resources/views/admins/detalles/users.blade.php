@extends('admins.master')
@section('body')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{asset('css/perfil.css')}}" rel="stylesheet">
        <script src="{{asset('js/perfil.js')}}"type="text/javascript">

        </script>
        <main role="main">
            <div class="container px-auto">
                <div class="row px-auto">
                    <div class="information-personal col-md-4 order-md-1 mx-auto mt-4 mb-0">
                        <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 pt-4 shadow-sm h-md-250 position-relative">
                            <div id="infopersonal">
                                <div class="text-center mx-auto" >
                                        <img class="foto-perfil" src="https://via.placeholder.com/200x200.png">
                                        <div class="col-md-9 mb-0 text-right mx-auto div-camera">
                                            <a href="#" class="btn-remove mx-1 px-1"><span class="fa fa-trash-o"></span></a>
                                            <a href="#" class="btn-upload mx-1 px-1"><span class="fa fa-upload"></span></a>
                                        </div>
                                </div>
                                <div class="text-center mx-3 mt-0 pt-2">
                                    <h3 class="mb-0">
                                        <span>{{$user->nombre}} </span>
                                        <span>{{$user->apellido}} </span>
                                    </h3>
                                </div>
                                <div class="mt-2 text-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="text-center"><a href="">Ver comentarios>></a></div>
                                <hr class="ml-4 mr-4">
                                <h6 class="my-0 ml-4">PRESENTACIÓN </h6>
                                <div class="col-md-12 ml-4 pr-5">
                                    @if($user->genero==1)
                                    <Span id="TxtSexo" class="text-muted"><i class="fa fa-female"></i> Mujer</span> de <Span id="TxtSexo" class="text-muted">{{ $user->edad}} años</span><br>
                                    @else
                                    <Span id="TxtSexo" class="text-muted"><i class="fa fa-male"></i> Hombre</span> de <Span id="TxtSexo" class="text-muted">{{ $user->edad}} años</span><br>
                                    @endif
                                    <span class="fa fa-birthday-cake text-muted"></span><span id="TxtFecha"  class="text-muted"> Nació el {{ Date::createFromFormat('Y-m-d H:i:s', $user->nacimiento)->format('d \d\e F \d\e Y') }}</span><br>
                                    <Span class="text-muted  mr-5">
                                    @if($user->id_ciudad!=null && $user->id_estado!=null && $user->id_pais!=null)
                                        <i class="fas fa-map-marker-alt"></i> Vive en {{$municipios[$user->id_ciudad - 1]->municipio}}, {{$estados[$user->id_estado- 1]->estado}}, {{$paises[$user->id_pais - 1]->pais }}</span><br>
                                    @else
                                        <i class="fa fa-info-circle"></i>Hace falta esta información. 
                                    @endif
                                    
                                </div>
                                <div class="text-right ">
                                    <button type="button "id="BtnEditarPersonal"  class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                                </div>
                             </div>
                             <div id="infopersonal2">
                                 <h6 class="text-uppercase ml-3">Modificar datos personales</h6>
                                <div class="ml-4 mb-2">   
                                    <span class="text-muted">Nombre:</span>
                                    <input id="txtnombre" class="form-control" value="{{$user->nombre}}">
                                    <span id="error" class="help-block text-danger mx-auto"></span>
                                    <span class="text-muted" >Apellido:</span>
                                    <input id="txtapellido" class="form-control" value="{{$user->apellido}}">
                                    <span id="error2" class="help-block text-danger mx-auto"></span>
                                </div>
                                <div class="col-md-5 ml-2">
                                    <span class="text-muted">Fecha de nacimiento:</span>
                                    <input id="CmbFecha"type="date"  class="form-control" id="date"  value="{{Date::createFromFormat('Y-m-d H:i:s', $user->nacimiento)->format('Y-m-d') }}" min="1960-01-01" max="2002-12-31"><br>
                                </div>
                                <div class="col-md-6 ml-2 mb-3"> 
                                    <div class="col-md-2 mb-2">
                                        <span class="text-muted">Sexo:</span>
                                        <div class="custom-control custom-radio">
                                        @if($user->genero==1)
                                            <input type="radio" id="f" name="sexo" class="custom-control-input" value="1" checked>
                                        @else
                                            <input type="radio" id="f" name="sexo" class="custom-control-input" value="1">
                                        @endif
                                            <label class="custom-control-label" for="f">Femenino</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="custom-control custom-radio">
                                        @if($user->genero==1)
                                            <input type="radio" id="m" name="sexo" class="custom-control-input" value="0">
                                        @else
                                            <input type="radio" id="m" name="sexo" class="custom-control-input" value="0" checked>
                                        @endif
                                            <label class="custom-control-label" for="m">Masculino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-4 mb-2">   
                                    <span class="text-muted">País</span>
                                    {{$selectpais=""}}
                                    <select id="CmbPais"  onchange='funcpais(this.value,<?php echo json_encode($estados); ?>)'  class="form-control">
                                        <option selected disabled hidden>Seleccionar....</option>
                                        @foreach($paises as $pais)
                                            @if($pais->id == $user->id_pais)
                                                <option value="{{ $pais->id }}" selected>{{ $pais->pais }}</option>
                                            @else
                                                <option value="{{ $pais->id }}">{{ $pais->pais }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="text-muted">Estado</span>
                                    <select id="CmbEstado" class="form-control" onchange='funcestado(this.value,<?php echo json_encode($municipios); ?>)'>
                                        <option selected disabled hidden>Seleccionar....</option>
                                        @foreach($estados as $estado)
                                            @if($estado->id == $user->id_estado)
                                                <option value="{{ $estado->id }}" selected>{{ $estado->estado }}</option>
                                            @else
                                                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="text-muted">Ciudad</span>
                                    <select id="CmbCiudad"  class="form-control"  >
                                    <option selected disabled hidden>Seleccionar....</option>
                                        @foreach($municipios as $municipio)
                                        @if($municipio->id == $user->id_ciudad)
                                            <option value="{{ $municipio->id }}" selected>{{ $municipio->municipio }}</option>
                                        @else
                                            <option value="{{ $municipio->id }}">{{ $municipio->municipio }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-right ">
                                    <button type="button "id="BtnGuardarPersonal" data-href="{{url('/perfil/actualizar')}}" class="form-inline icon btn btn-primary text-primary">Guardar</button>
                                </div>
                             </div>   
                        </div>
                        <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 pt-4 shadow-sm h-md-250 position-relative">
                            <h4 class="mx-3 mb-0">Información de contacto</h4>
                            <div class="ml-4">
                                <div id="DivContacto">
                                    
                                    <span id="LblEmail" class="text-muted"><i class="fa fa-envelope-o"></i> {{ $user->email }}</span><bR>
                                    
                                    <span id="LblTel"class="text-muted"> <i class="fa fa-phone"></i>
                                    @if($user->telefono == null)
                                        Agregar número telefónico
                                    @else
                                        {{$user->telefono}}
                                    @endif
                                    </span><br>
                                    <div class="text-right mt-2">
                                        <button id="BtnEditarContacto" type="button " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                                    </div>
                                </div>
                            </div>
                            <div id="DivContacto2" class="ml-3">
                                <span class="text-muted mt-2">Correo electrónico:</span>
                                <input type="text" class="form-control mt-2" id="TxtEmail" name="email" placeholder="" value="{{ $user->email }}" readonly>
                                <span class="text-muted mt-2">Número telefónico:</span>
                                <input type="text" class="form-control mt-2" id="TxtTel" name="telefono" placeholder="Ej. 3221234567" value="{{ $user->telefono }}">
                                <div class="text-right mt-2">
                                    <button id="BtnGuardarContacto" type="button " data-href="{{url('/perfil/contacto')}}"  class=" form-inline icon btn btn-primary text-primary ">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profesional-information col-md-7 order-md-2 mx-auto mt-4">
                        <div class="no-gutters border rounded overflow-hidden flex-md-row shadow-sm h-md-250" novalidate>
                            <h4 class=" ml-4  my-3 ">Formación académica</h4>
                            <div class="row mr-4 ml-4">

                                <div class="col-md-6 min-200 mb-3">
                                    <h6 class="text-uppercase">Nivel de estudios</h6>
                                    <span id="LblUniversidad">{{$userest->nivel}}</span>

                                    <select id="CmbUniversidad"  class="form-control">
                                        @foreach($estudios as $estudio)
                                            @if($estudio->id == $userest->id)
                                                <option value="{{ $estudio->id }}" selected>{{ $estudio->nivel }}</option>
                                            @else
                                                <option value="{{ $estudio->id }}">{{ $estudio->nivel }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 min-200 mb-3">
                                    <h6  class="text-uppercase">Área</h6>
                                    <span id="LblArea">{{$userarea->area}}</span>
                                    <select id="TxtArea"  class="form-control">
                                        @foreach($areas as $area)
                                            @if($area->id == $userarea->id)
                                                <option value="{{ $area->id }}" selected>{{ $area->area }}</option>
                                            @else
                                                <option value="{{ $area->id }}">{{ $area->area }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-0 ml-0 mr-1 text-right ">
                                    <button id="BtnEditarAca" type="button "    class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                                    <button id="BtnGuardarAca" data-href="{{url('/perfil/nivelyarea')}}" type="button "   class=" form-inline icon btn btn-primary">Guardar</button>
                                </div>
                            </div>

                        </div>
                        <div class="no-gutters border rounded overflow-hidden mt-2 flex-md-row shadow-sm h-md-250" novalidate>
                            <h4 class=" ml-4  my-3 ">Información laboral</h4>
                            <div class="row mr-4 ml-4">
                                <div  class="col-md-12 mb-0 pt-0">
                                <div id="DivConocimientos" class="pl-0 ml-0"><h6 class="text-uppercase mx-0 ">Conocimientos</h6>
                                    <blockquote class="mx-0 mt-0 pt-0" id="BlockConocimientos">@if($user->conocimientos!=null){{$user->conocimientos}}
                                        @else
                                        <i class="fa fa-info-circle"></i>Hace falta esta información.
                                        @endif
                                    </blockquote>
                                    <textarea class="form-control mb-2" id="TxtConocimientos" rows="3">{{$user->conocimientos}}</textarea>
                                    <div class="col-md-12 mb-0 ml-0  text-right ">
                                        <button id="BtnEditarCon" type="button " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                                        <button data-href="{{url('/perfil/addconocimientos')}}" id="BtnGuardarCon"  type="button " class=" form-inline icon btn btn-primary text-primary">Guardar</button>
                                    </div></div>
                                    <hr class="ml-3 mr-3">
                                </div>
                            <!-- SECCION DE TAGS*****-->
                                <div class="col-md-12 mb-0 pt-0">
                                    <h6>Habilidades (Tags) <small id="contador-tags" class=" text-muted">{{count($rtags)}} de 10</small></h6> 
                                    <div class="DivTags col-md-12  ml-0 pl-0 mb-2 mt-0 pt-0 text-left">
                                        <small  class="text-muted"> Introduce habilidad (Presiona 'enter' para añadir) </small><br>
                                        <div class="col-md-8 ml-0 mr-2 pl-0">
                                            <template id="listtag" size="5">
                                                @foreach($tags as $tag)
                                                    <option >{{ $tag->nombre }}</option>
                                                @endforeach    
                                            </template>
                                            <input name="inputtag" autocomplete="off"  list="searchresults" data-min-length='1' type="text" class="form-control"  id="inputtag" data-href="{{url('/perfil/createtags')}}" name="inputtag" placeholder="ej. computación, office, vendedora" >
                                            <datalist id="searchresults"></datalist>
                                        </div>
                                        <small class="text-warning info-tags"><i class="fa fa-info-circle"></i>Tienes el limites de tags permitido, elimina algunos para agregar más.</small>
                                    </div>
                                    
                                    <div id="DivTags" class="tags mb-2 text-secondary">
                                    @if($rtags == "[]")
                                    <p class="text-muted"><i class="fa fa-info-circle"></i>Agrega habilidades y tags de búsqueda para completar tu perfil.</p>
                                    @endif
                                    @foreach($rtags as $tags)
                                        @if($tags->id_usuario == $user->id)
                                        <span class="tag">{{ $tags->tag->nombre }} <i id="{{$tags->id}}" data-href="{{url('/perfil/deletetags')}}"class="delete-tag fa fa-close"></i></span>
                                        @endif
                                    @endforeach
                                    </div>
                                    <div class="col-md-12 mb-0 ml-0  text-right ">
                                        <button id="BtnEditarTag" onclick="" type="button " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                                        <button id="BtnGuardarTag" onclick="" type="button " class=" form-inline icon btn btn-primary text-primary ">Guardar</button>
                                    </div>
                                    <hr class="ml-3 mr-3">
                                </div>
                            <!-- SECCION DE TAGS*****-->


                                <div class="col-md-12 mb-3">
                                    <h6>Curriculum</h6>
                                    <div class="row mr-4 ml-4">

                                        <div class="col-md-12 mb-3 pl-0">
                                            <span><img src="{{asset('images/icon/file.png')}}"><a href="#">mi-curriculum.pdf</a>
                                                <button type="button" class="btn btn-remove pt-0 ml-0 btn-outline-light"><img class="mt-0"src="{{asset('images/icon/remove.png')}}"></button>
                                            </span>
                                        </div>
                                        <div class="col-md-12 ml-0 pl-0 mb-3">
                                            <button type="file " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/upload.png')}}">Subir</button>
                                        </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -->
            </div>
        </main>
@endsection
@section('scripts')

   <script src="{{asset('js/EditPerfil.js')}}"> </script>
@endsection