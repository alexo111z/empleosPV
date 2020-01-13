@extends('empresas.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{asset('css/perfil.css')}}" rel="stylesheet">

@section('body')
<main role="main">
    <div class="container px-auto">
        <div class="row px-auto">
            <div class="information-personal col-md-4 order-md-1 mx-auto mt-4 mb-0">
                <div class="no-gutters border rounded overflow-hidden flex-md-row mb-2 pt-4 shadow-sm h-md-250 position-relative">
                    <div id="infopersonal">
                        <div class="text-center mx-auto" >
                            @if(isset($user->foto))
                                <img class="foto-perfil" src="{{ route('usuarios.foto',['file'=>$user->foto]) }}">
                            @else
                                <img class="foto-perfil" src="{{ route('usuarios.foto',['file'=>'user.png']) }}">
                            @endif         
                        </div>
                        <div class="text-center mx-3 mt-0 pt-2">
                            <h3 class="mb-0">
                                <span>{{$user->nombre}} </span>
                                <span>{{$user->apellido}} </span>
                            </h3>
                            <div class="mt-2 text-center">
                                @for ($i = 1; $i<=5; $i++)
                                    @if($i<=$cal)
                                        <span class="fa fa-star checked"></span>
                                    @elseif($cal>($i-1))
                                        <span class="fa fa-star-half-full checked"></span>
                                    @else
                                        <span class="fa fa-star"></span>
                                    @endif
                                @endfor
                                @if(!(isset($cal) && $cal>0))
                                    <p class="text-muted"><i class="fa fa-info-circle"></i>Aun no tiene calificaciones.</p>
                                @endif
                            </div>
                            <hr class="ml-4 mr-4">
                        </div>
                        <h6 class="my-0 ml-4">PRESENTACIÓN </h6>
                        <div class="col-md-12 ml-4 pb-4 pr-5">
                            @if($user->genero==1)
                            <Span id="TxtSexo" class="text-muted"><i class="fa fa-female"></i> Mujer</span> de <Span id="TxtSexo" class="text-muted">{{ $user->edad}} años</span><br>
                            @else
                            <Span id="TxtSexo" class="text-muted"><i class="fa fa-male"></i> Hombre</span> de <Span id="TxtSexo" class="text-muted">{{ $user->edad}} años</span><br>
                            @endif
                            <span class="fa fa-birthday-cake text-muted"></span><span id="TxtFecha"  class="text-muted"> Nació el {{ Date::createFromFormat('Y-m-d H:i:s', $user->nacimiento)->format('d \d\e F \d\e Y') }}</span><br>
                            <Span class="text-muted  mr-5">
                            @if($user->id_ciudad!=null && $user->id_estado!=null && $user->id_pais!=null)
                                <i class="fas fa-map-marker-alt"></i> Vive en {{$municipios[$user->id_ciudad - 1]->municipio}}, {{$estados[$user->id_estado- 1]->estado}}, {{$paises[$user->id_pais - 1]->pais }}</span><br>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 pt-2 pb-1 shadow-sm h-md-250 position-relative">
                    <h4 class="mx-3 mb-0">Información de contacto</h4>
                    <div class="ml-4">
                        <div id="DivContacto">
                            
                            <span id="LblEmail" class="text-muted"><i class="fa fa-envelope-o"></i> {{ $user->email }}</span><bR>
                            
                            <span id="LblTel"class="text-muted"> 
                            @if($user->telefono != null)
                                <i class="fa fa-phone"></i>{{$user->telefono}}
                            @endif
                            </span><br>
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
                        </div>
                        <div class="col-md-6 min-200 mb-3">
                            <h6  class="text-uppercase">Área</h6>
                            <span id="LblArea">{{$userarea->area}}</span>
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
                                    <i class="fa fa-info-circle"></i>El usuario no ha introducido conocimientos.
                                    @endif
                                </blockquote>
                                <hr class="ml-3 mr-3">
                            </div>
                            <!-- SECCION DE TAGS*****-->
                            <div class="col-md-12 mb-0 pl-0 pt-0">
                                <h6 clas="text-uppercase">Habilidades (Tags) </h6> 
                                <div id="DivTags" class="tags mb-2 text-secondary">
                                    @if($rtags == "[]")
                                    <p class="text-muted"><i class="fa fa-info-circle"></i>El usuario no ha registrado habilidades o tags de búsqueda para completar tu perfil.</p>
                                    @endif
                                    @foreach($rtags as $tags)
                                        @if($tags->id_usuario == $user->id)
                                        <span class="tag">{{ $tags->tag->nombre }} </span>
                                        @endif
                                    @endforeach
                                </div>
                                <hr class="ml-3 mr-3">
                            </div>
                            <div class="col-md-12 mb-3">
                                <h6>Curriculum</h6>
                                <div class="row mr-4">
                                    @if(isset($user->curriculum))
                                    <span><img src="{{asset('images/icon/file.png')}}"><a href="{{Route('empresas.usuariosCv',['alias' => $user->alias])}}">CurriculumVitae.pdf</a></span>
                                    @else
                                    <div class="col-md-12 my-0 ml-0 pl-0"><p class="text-muted col-sm-12 ml-0 pl-0 mt-3"><i class="fa fa-info-circle"></i>El usuario no ha anexado su curriculum.</p></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- -->
        <div class="col-md-12 order-md-1 mx-auto px-0 mt-4 mb-0">
            <div class="no-gutters mx-0 px-4 border rounded overflow-hidden flex-md-row mb-4 pt-4 shadow-sm h-md-250 position-relative">
                <div class="row px-3">
                    <h4 class=" my-0 py-0 mr-5 ">Opinión de las empresas</h4>
                    @if(isset($comentarios) && $comentarios!="[]")
                        @if($user->coment==0)
                            <p class="text-muted col-sm-12 mt-3"><i class="fa fa-info-circle"></i>Este usuario tiene los comentarios en privado</p>
                        @else 
                            @foreach($comentarios as $comentario)
                            <div  class="col-md-12 mt-3 mb-0 pt-0">
                                <h6 class="text-uppercase mx-0 mb-0 pb-0">
                                    @if(isset($comentario->logo))
                                        <img class="icon-profile" src="{{ route('empresas.logo',['file'=>$comentario->logo]) }}">
                                    @else
                                        <img class="icon-profile" src="{{ route('empresas.logo',['file'=>'empresa.png']) }}">
                                    @endif
                                    {{ $comentario->nombre  }}
                                </h6>
                                    @for ($i = 1; $i<=5; $i++)
                                            @if($i<=$comentario->califi)
                                                <span class="fa fa-star checked"></span>
                                            @elseif($comentario->califi>($i-1))
                                                <span class="fa fa-star-half-full checked"></span>
                                            @else
                                                <span class="fa fa-star"></span>
                                            @endif
                                        @endfor
                                <br><small class="text-muted">{{ Date::createFromFormat('Y-m-d H:i:s', $comentario->fecha)->format('d \d\e F \d\e Y') }}</small>
                                <blockquote class="mx-0 mt-0 pt-0" id="BlockConocimientos">{{$comentario->coment}} </blockquote>
                            </div>
                            <hr class="ml-3 mr-3">
                            @endforeach
                        @endif
                    @else
                        <p class="text-muted col-sm-12 mt-3"><i class="fa fa-info-circle"></i>Aun no tiene comentarios.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection