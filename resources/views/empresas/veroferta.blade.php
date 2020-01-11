@extends('empresas.master')
<link href="{{asset('css/veroferta.css')}}" rel="stylesheet">
@section('body')
<main role="main">
    <nav class="nav-buscador navbar  flex-md-nowrap mt-6">
        <div class="row div-search input-group search-group text-leftpt-2 w-50 mb-1">
            <a class="regresar" href="{{ route('misofertas') }}"><i class="	fas fa-arrow-left"></i> volver</a>
        </div>
    </nav>

    <div class="row">

        <div class="col-md-8 mx-auto ">
            <div class="col-sm-12 px-3 pt-3"><h3 class="mb-0">{{ $oferta->titulo }}</h3></div>
            <div class="col-sm-12 px-3 py-0 my-0 "><p class="mb-1">{{ $oferta->d_corta }}</p></div>
            @if(isset($oferta->salario))
            <div class="col-sm-12 mt-0 pt-0 mt-0"><h6>${{ $oferta->salario }} al mes.</h6></div>
            @endif
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

        </div>


        <div class="col-md-3 my-3 px-auto mx-auto" style="min-width: 250px;">
            <div class=" border rounded overflow-hidden text-center mx-auto mb-2 py-3">
                <div class="text-center" >
                    @if((Date::createFromFormat('Y-m-d H:i:s', $oferta->vigencia)->greaterThan(Carbon\Carbon::now())))
                        <strong class="text-success ">Vigente hasta {{Date::createFromFormat('Y-m-d H:i:s', $oferta->vigencia)->format('d \d\e F \d\e Y')}}</strong>
                    @else
                        <strong class="text-danger">No Vigente, se venció el {{Date::createFromFormat('Y-m-d H:i:s', $oferta->vigencia)->format('d \d\e F \d\e Y')}}</strong>
                    @endif
                </div>
            </div>
            <div class=" border rounded overflow-hidden text-center mx-auto py-3">
                <div class="text-center mb-4" >
                    <small class="text-muted text-uppercase">Opciones:</small>
                </div>
                <div class="text-center mx-auto" >
                        <div class="col-sm-12 my-3 mx-auto text-center">
                            <button type="submit" class="btn btn-postular btn-block "><h5>Editar mi oferta</h5></button>
                        </div>

                        <div class="col-sm-12 my-3 mx-auto text-center">
                            {{ csrf_field() }}
                            <button data-toggle="modal" data-target="#confirmdelete" type="button" class="btn btn-danger  btn-block "><h5>Eliminar mi oferta</h5></button>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> ¿Está seguro que desea eliminar esta oferta?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span class="text-danger"><i class="fas fa-info-circle"></i>Se eliminará de forma definitiva, ya no aparecerá en su lista.</span>
                    </div>
                    <form id="deleteemp" action="{{ route('empresas.deleteOferta', [$oferta->id]) }}" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button  class="btn btn-danger" type="submit" ><i class="fa fa-trash" aria-hidden="true"></i> Eliminar oferta</button>  
                        </div>
                    </form>
                </div>
            </div>
        </div>

</main>
@endsection
