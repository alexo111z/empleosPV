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
            <div class="col-sm-12 px-3 mt-0 pt-0"><p class="text-muted"><i class='fas fa-map-marker-alt'></i> {{ $oferta->ciudad }}, {{ $oferta->estado }}</p></div>
            <div class="col-sm-12 px-3 mt-1">
                <p>
                {{ $oferta->d_corta }}
                </p>
            </div>
            <div class="col-sm-12 px-"><h6 class="mb-0 text-uppercase">Salario: ${{ $oferta->salario }}</h6></div>
            <hr class="mb-4">
            <div class="col-sm-12 px-3 mt-1">
                <h5>Descripción:</h5>
                <blockquote>
                    {{ $oferta->d_larga }}
                </blockquote>
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
                <div class="col-sm-12 my-3 px-3 text-center">
                    <button type="button" class="btn btn-postular btn-block "><h5>Postularme</h5></button>
                </div>

            </div>
        </div>
    </div>

</main>
@endsection
