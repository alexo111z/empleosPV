@extends('master')
<link href="{{asset('css/ofertas.css')}}" rel="stylesheet">
@section('body')

  <main role="main" class="col-md-12 py-0 px-0">
    <nav class="nav-buscador navbar px-auto  flex-md-nowrap  text-center">
        <h3 class="mx-auto pt-3 pb-0"><i class="fa fa-briefcase"></i> Mis postulaciones</h3>
    </nav>
    
    <div class="col-md-9 order-md-2 mx-auto mt-4">
    <!--div oferta-->
        <div class="div-oferta mb-3 no-gutters border rounded overflow-hidden flex-md-row shadow-sm h-md-250" onclick="location.href='{{route('ofertas.veroferta')}}'" novalidate>
          <div class="col-sm-12 px-3 pt-3"><h4 class="mb-0">Promotora de marca</h4></div>
          <div class="col-sm-12 px-3 mt-0 pt-0"><small class="text-muted text-uppercase">TOTALPLAT TELECOMUNICACIONES SA de CV</small></div>
          <div class="col-sm-12 px-3 mt-1">
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultrices, arcu a sagittis dictum, lorem nulla posuere orci, vel pulvinar posuere. 
            </p>
          </div>
          <div class="row col-sm-12 px-3">
            <div class="col-sm-4">
              <p class="text-muted"><i class='fas fa-map-marker-alt'></i> Puerto Vallarta, Jalisco</p>
            </div>
            <div class="tags  col-sm-8 text-right pb-3 pr-0 mr-0"><i class='fas fa-tags'></i>
              @for ($i = 0; $i < 10; $i++)
                <span class="tag">mitag{{$i}}</span>
                @if($i < 9)
                  <span>,</span>
                @endif  
              @endfor
            </div>
          </div>

        </div>
      <!--fin oferta-->
    </div>
      
</main>
@endsection