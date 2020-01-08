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
            <div class=" border rounded overflow-hidden text-center mx-auto py-3">
                <div class="text-center mb-4" >
                    <small class="text-muted text-uppercase">Empresa que realizó la oferta:</small>
                </div>
                <div class="text-center mx-auto" >
                    @if(isset($oferta->empresa->logo))
                        <img class="imagen" src="{{ route('empresas.logo',['file'=>$oferta->empresa->logo]) }}">
                    @else
                        <img class="imagen"src="{{ route('empresas.logo',['file'=>'empresa.png']) }}">
                    @endif
                    <h5 class="my-1 mx-3">{{ $oferta->empresa->nombre }}</h5>
                </div>
            
            </div>
        </div>
    </div>

</main>
@endsection
@section('scripts')
<script src="{{asset('js/veroferta.js')}}"> </script>
@endsection