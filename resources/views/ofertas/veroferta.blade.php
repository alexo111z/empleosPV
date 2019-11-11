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
            <div class="col-sm-12 px-3 pt-3"><h3 class="mb-0">Promotora de marca</h3></div>
            <div class="col-sm-12 px-3 mt-0 pt-0"><p class="text-muted"><i class='fas fa-map-marker-alt'></i> Puerto Vallarta, Jalisco</p></div>
            <div class="col-sm-12 px-3 mt-1">
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultrices, arcu a sagittis dictum, lorem nulla posuere orci, vel pulvinar posuere. 
                </p>
            </div>
            <div class="col-sm-12 px-"><h6 class="mb-0 text-uppercase">Salario: $5,000.00</h6></div>
            <hr class="mb-4">
            <div class="col-sm-12 px-3 mt-1">
                <h5>Descripción:</h5>
                <blockquote>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium in risus eget imperdiet. Suspendisse potenti. Sed tempus diam et velit finibus, et pretium ligula consectetur. Maecenas finibus feugiat arcu, quis semper sem viverra et. Vestibulum at lacinia ligula. Sed nec pellentesque magna. Etiam quis mi et ante molestie maximus. Ut pharetra enim sed enim ultricies vehicula. Nullam molestie luctus enim et vulputate. Etiam orci diam, interdum at magna eu, bibendum luctus orci.
                    Donec euismod quam tellus, a mollis ligula consectetur quis. Etiam accumsan justo ac eleifend tempor. Nunc quis fermentum lorem. Praesent facilisis at leo non auctor. Quisque id fringilla orci. Nunc efficitur nibh eget sapien finibus molestie. Phasellus feugiat lacinia est a blandit. Fusce elementum quis velit vel vulputate. Integer ipsum leo, blandit dapibus sodales sollicitudin, fringilla quis dolor. Nulla sed.
                </blockquote>
            </div>
            <hr class="mb-4">
            <div class="col-sm-12 px-3 mt-1">
                <h5><i class='fas fa-tags'></i> Tags:</h5>
                <div class="tags">
                @for ($i = 0; $i < 10; $i++)
                     <span class="px-2  border rounded">mitag{{$i}}</span>
                @endfor
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
                    <h5 class="my-1 mx-3">TOTALPLAT TELECOMUNICACIONES SA de CV</h5>
                </div>
                <div class="col-sm-12 my-3 px-3 text-center">
                    <button type="button" class="btn btn-postular btn-block "><h5>Postularme</h5></button>
                </div>
                
            </div>
        </div>
    </div> 
</main>
@endsection