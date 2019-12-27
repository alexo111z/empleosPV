@extends('master')
<link href="{{asset('css/ofertas.css')}}" rel="stylesheet">
@section('body')

  <main role="main" class="col-md-12 py-0 px-0">
    <nav class="nav-buscador navbar  flex-md-nowrap mt-6">
      <div class="row div-search input-group search-group text-center pt-2 mx-auto px-auto w-50 mb-1">
          <h4 class="Text-uppercase mx-auto text-center">Mis postulaciones</h4>
      </div>
    </nav>
    <div id="lista-ofertas" class="col-md-9 order-md-2 mx-auto mt-4">   
        @forelse($ofertas as $oferta)
        <!--div oferta-->
        <div class="div-oferta mb-3 no-gutters border rounded overflow-hidden flex-md-row shadow-sm h-md-250" onclick="location.href='{{ route('ofertas.veroferta', ['oferta' => $oferta->id, $oferta->titulo] ) }}'" novalidate>
            <div class="col-sm-12 px-3 pt-3"><h4 class="mb-0">{{ $oferta->titulo }}</h4></div>
            <div class="col-sm-12 px-3 mt-0 pt-0"><small class="text-muted text-uppercase">{{ $oferta->empresa->nombre }}</small></div>
            <div class="col-sm-12 px-3 mt-1">
                <p>
                    {{ $oferta->d_corta }}
                </p>
            </div>
            <div class="row col-sm-12 px-3">
                <div class="col-sm-6">
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
                <div class="tags  col-sm-6 text-right pb-3 pr-0 mr-0">
                  <?php $estado=True ?>
                    @foreach($rTags as $tags)
                        
                        @if($tags->id_oferta == $oferta->id)
                          @if($estado==False) 
                            <span>,</span>
                          @else 
                            <i class='fas fa-tags'></i> 
                            <?php $estado=False ?>
                          @endif
                          <span>{{ $tags->tag->nombre}}</span>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!--fin oferta-->
        @empty
        <div class="alert alert-info" role="alert">
          <i class="fa fa-info-circle" aria-hidden="true"></i> Aún no te haz postulado.<br><br>
          <p>¿Qué estás esperando?, hay ofertas de empleo que esperan por ti.</p>
          
        </div>
        @endforelse
        <div class="col-sm-12 text-right pr-0 mr-0">
        
        {{$ofertas->links()}}
          
        </div>    
    </div>
  </main>
@endsection
@section('scripts')

 <script src="{{asset('js/result.js')}}"> </script>
@endsection