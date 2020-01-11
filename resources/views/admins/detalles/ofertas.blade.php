@extends('admins.master')
<link href="{{asset('css/admin/veroferta.css')}}" rel="stylesheet">

@section('body')
<main role="main">
    <nav class="nav-buscador navbar  flex-md-nowrap mt-6">
        <div class="row div-search input-group search-group text-leftpt-2 w-50 mb-1">
            <a class="regresar" href="{{URL::previous()}}"><i class="	fas fa-arrow-left"></i> volver</a>
        </div>
    </nav>

    <div class="row">

        <div class="col-md-8 mx-auto divOferta">
            <div class="col-sm-12 px-3 pt-3"><h3 class="mb-0">{{ $oferta->titulo }}</h3></div>
            <div class="col-sm-12 px-3 py-0 my-0 "><p class="mb-1">{{ $oferta->d_corta }}</p></div>
            <div class="col-sm-12 mt-0 pt-0 mt-0"><h6>${{ $oferta->salario }} al mes.</h6></div>
            <div class="col-sm-12 px-3 mt-0 pt-0">
                <p class="text-muted"><i class='fas fa-map-marker-alt'></i> 
                @foreach($ciudades as $ciudad)
                    @if($ciudad->id == $oferta->id_ciudad)
                    {{ $ciudad->municipio }},
                    @endif
                @endforeach
                @foreach($estados as $estado)
                    @if($estado->id == $oferta->id_estado)
                    {{ $estado->estado }},
                    @endif
                @endforeach
                @foreach($paises as $pais)
                    @if($pais->id == $oferta->id_pais)
                    {{ $pais->pais }}</p>
                    @endif
                @endforeach
            </div>
            <hr class="mb-4">
            <div class="col-sm-12 px-3 mt-1">
                <h5>Descripción:</h5>
                <blockquote class="d-larga"> {{ $oferta->d_larga }} </blockquote>
            </div>
            <hr class="mb-4">
            <div class="col-sm-12 px-3 mt-1">
                <h5><i class='fas fa-tags'></i> Tags:</h5>
                <div class="tags">
                    @if($tags->count() == 0)
                        No hay tags en esta oferta.
                    @endif
                    @foreach($tags as $tag)
                        <span class="px-2  border rounded">{{ $tag->tag->nombre }}</span>
                    @endforeach
                </div>
            </div>

            <div class="col-md-12 mb-0 ml-0  text-right ">
                <button id="BtnEditar" onclick="" type="button " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
            </div>

        </div>

        <div class="col-md-8 mx-auto divEditOferta">
            <form action=""></form>
            <div class="col-sm-12 px-3 pt-3">
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="titulo" class="form-control" id="titulo" placeholder="Titulo" value="{{ $oferta->titulo }}">
                </div>
            </div>
            <div class="col-sm-12 px-3 py-0 my-0 ">
                <div class="form-group">
                    <label for="desCorta">Descripcion corta</label>
                    <textarea class="form-control" id="desCorta" rows="3">
                        {{ $oferta->d_corta }}
                    </textarea>
                </div>
            </div>
            <div class="col-sm-12 mt-0 pt-0 mt-0">
                <div class="form-group">
                    <label for="salario">Salario</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>
                        <input type="salario" class="form-control" id="salario" placeholder="Salario" value="{{ $oferta->salario }}">
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-sm-12 px-3 mt-0 pt-0">
                <div class="col-sm-6 lugar">
                    <span class="text-muted">País</span>
                    {{$selectpais=""}}
                    <select id="CmbPais"  onchange='funcpais(this.value,<?php echo json_encode($estados); ?>)'  class="form-control">
                        <option selected disabled hidden>Seleccionar....</option>
                        @foreach($paises as $pais)
                            @if($pais->id == $oferta->id_pais)
                                <option value="{{ $pais->id }}" selected>{{ $pais->pais }}</option>
                            @else
                                <option value="{{ $pais->id }}">{{ $pais->pais }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 lugar">
                    <span class="text-muted">Estado</span>
                    <select id="CmbEstado" class="form-control" onchange='funcestado(this.value,<?php echo json_encode($ciudades); ?>)'>
                        <option selected disabled hidden>Seleccionar....</option>
                        @foreach($estados as $estado)
                            @if($estado->id == $oferta->id_estado)
                                <option value="{{ $estado->id }}" selected>{{ $estado->estado }}</option>
                            @else
                                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 lugar">
                    <span class="text-muted">Ciudad</span>
                    <select id="CmbCiudad"  class="form-control"  >
                    <option selected disabled hidden>Seleccionar....</option>
                        @foreach($ciudades as $municipio)
                        @if($municipio->id == $oferta->id_ciudad)
                            <option value="{{ $municipio->id }}" selected>{{ $municipio->municipio }}</option>
                        @else
                            <option value="{{ $municipio->id }}">{{ $municipio->municipio }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            </div>

            <hr class="mb-4">
            <div class="col-sm-12 px-3 mt-1">
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" id="descripcion" rows="5">
                        {{ $oferta->d_larga }}
                    </textarea>
                </div>
            </div>
            <hr class="mb-4">
            <div class="col-sm-12 px-3 mt-1">
                <h6>Habilidades (Tags) <small id="contador-tags" class=" text-muted">{{count($tags)}} de 10</small></h6> 
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
                @if($tags == "[]")
                <p class="text-muted"><i class="fa fa-info-circle"></i>Agrega habilidades y tags de búsqueda para completar tu perfil.</p>
                @endif
                @foreach($tags as $tags)
                    @if($tags->id_oferta == $user->id)
                    <span class="tag">{{ $tags->tag->nombre }} <i id="{{$tags->id}}" data-href="{{url('/perfil/deletetags')}}"class="delete-tag fa fa-close"></i></span>
                    @endif
                @endforeach
                </div>
            </div>

            <div class="col-md-12 mb-0 ml-0  text-right ">
                <button id="BtnCancelar" onclick="" type="button " class=" form-inline icon btn btn-light ">Cancelar</button>
                <button id="BtnGuardar" data-href="{{ route('admin.edit.ofr', ['oferta'=>$oferta->id]) }}" type="button " class=" form-inline icon btn btn-light ">Guardar</button>
            </div>

        </div>


        <div class="col-md-3 my-3 mx-3">
            <div class=" border rounded overflow-hidden text-center mx-auto py-3">
                <div class="text-center mb-4" >
                    <small class="text-muted text-uppercase">Empresa que realizó la oferta:</small>
                </div>
                <div class="text-center mx-auto" >
                    <img src="https://via.placeholder.com/200x200.png">
                    <h5 class="my-1 mx-3">{{ $oferta->empresa->nombre }}</h5>
                </div>
            
                {{-- revisar --}}
                <form method="post" action="">
                    <div class="col-sm-12 my-3 px-3 text-center">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-postular btn-block "><h5>Editar</h5></button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>

</main>
@endsection
@section('scripts')

   <script src="{{asset('js/EditarOferta.js')}}"> </script>
@endsection