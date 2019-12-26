@extends('master')
<link href="{{asset('css/veroferta.css')}}" rel="stylesheet">
@section('body')
<main role="main">
    <nav class="nav-buscador navbar  flex-md-nowrap mt-6">
        <div class="row div-search input-group search-group text-leftpt-2 w-50 mb-1">
            <a class="regresar" href="{{route('ofertas.lista')}}"><i class="	fas fa-arrow-left"></i> volver</a>
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


        <div class="col-md-3 my-3 mx-3">
            <div class=" border rounded overflow-hidden text-center mx-auto py-3">
                <div class="text-center mb-4" >
                    <small class="text-muted text-uppercase">Empresa que realizó la oferta:</small>
                </div>
                <div class="text-center mx-auto" >
                    <img src="https://via.placeholder.com/200x200.png">
                    <h5 class="my-1 mx-3">{{ $oferta->empresa->nombre }}</h5>
                </div>
            @guest
                <div class="col-sm-12 my-3 px-3 text-center">
                    <p><a href="{{route('usuarios.registrar')}}">!Registrate aquí!</a> para poder postularte en este empleo.</p>  
                </div>
            @else
            @if($solicitud=="[]")
                <form method="post" action="{{ route('oferta.solicitud', [$oferta->id]) }}">
                    <div class="col-sm-12 my-3 px-3 text-center">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-postular btn-block "><h5>Postularme</h5></button>
                    </div>
                </form>
            @else
                <form method="post" action="{{ route('oferta.solicitud.cancelar', [$oferta->id]) }}">
                    <div class="col-sm-12 my-3 px-3 text-center">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-block "><h5>Cancelar postulación</h5></button>
                    </div>
                </form>
            @endif
            @endguest
            </div>
        </div>
    </div>

</main>
@endsection