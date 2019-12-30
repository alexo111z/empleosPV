@extends('master')
<link href="{{asset('css/ofertas.css')}}" rel="stylesheet">
@section('body')

  <main role="main" class="col-md-12 py-0 px-0">
  {!! Form::open(array('url'=>"/ofertas/buscar",'method'=>'POST', 'id'=>'buscador')) !!}
    <nav class="nav-buscador navbar  flex-md-nowrap mt-6">
    
    <div class="row div-search input-group search-group text-center pt-2 mx-auto w-50 mb-1">
        <input value="{{$empleo}}" id="empleo" name="empleo" class="form-control mx-auto form-control-dark " type="text" placeholder="Busca empleos ahora" aria-label="Search">
        <div class="input-group-prepend">
            <button id="btn-search"class="btn btn-search my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </div> 
        
        <div class="row w-100 justify-content-end text-right mx-0">
        
          <div class="col-sm-3 text-right mr-0 pr-0"> <small ><a href="{{route('ofertas.lista')}}">Limpiar búsqueda</a></small></div>  
        </div>
    </div>
    <div class="div-busqueda-avanzada text-right"><i class="fas fa-cog"></i> <a class="link-busqueda" href="{{route('ofertas.busqueda')}}">Búsqueda avanzada>></a></div>
    </nav>
    @if(isset($data))
    <div class="row col-sm-10 mx-auto px-auto ">
      <div class="col-sm-3">
        <small class="text-muted">Se han encotrado {{$ofertas->count()}} ofertas</small>
      </div>
      <div class="col-sm-3"> 
        <small class="text-muted">Sueldo:
          @if($data['min']!="null" && $data['max']!="null")
            Entre ${{$data['min']}} y ${{$data['max']}} pesos.
          @elseif($data['min']=="null" && $data['max']!="null")
            Hasta ${{$data['max']}} pesos.
          @elseif($data['min']!="null" && $data['max']=="null")
            Mayor de ${{$data['min']}} pesos.
          @else
            Sin especificar.
          @endif
        </small>
      </div>
      <div class="col-sm-5">
        <small class="text-muted">
          @if($data["etiquetas"]!="null" && $data["etiquetas"]!="[]")
          <i class='fas fa-tags'></i> {{ str_replace('"', "",trim($data["etiquetas"], '[]'))}}
          @endif
        </small>
      </div>
    </div>
    @endif
    {!! Form::close() !!}
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
          <i class="fa fa-info-circle" aria-hidden="true"></i> No hay empleos que mostrar que coincidan con tu búsqueda.<br><br>
          <p>Te sugerimos:</p>
          <ul>
              <li>Utilizar palabras comunes o sinónimos</li>
              <li>Evitar el uso de muchos filtros</li>
              <li>Revisar la ortografía</li>
              <li>Realizar una nueva búsqueda</li>
          </ul>
        </div>
        @endforelse
        <div class="col-sm-12 text-right pr-0 mr-0">
        
        @if(isset($data))
        {{$ofertas->appends(["empleo"=> $data["empleo"],"etiquetas"=>$data["etiquetas"],"min"=>$data["min"],"max"=>$data["max"]])->links() }}
        @else
          {{$ofertas->appends(["empleo"=> $empleo])->links() }}
        @endif
          
        </div>    
    </div>
  </main>
@endsection
