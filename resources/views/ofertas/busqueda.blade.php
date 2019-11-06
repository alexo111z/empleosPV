@extends('master')
<link href="{{asset('css/busqueda.css')}}" rel="stylesheet">
@section('body')
<main role="main">
    <nav class="nav-buscador navbar  flex-md-nowrap mt-6">
        <div class="row div-search input-group search-group text-leftpt-2 w-50 mb-1">
            <a class="regresar" href="{{route('ofertas.lista')}}"><i class="	fas fa-arrow-left"></i> volver</a>
        </div>   
    </nav>
    <div class="container">
        <div class="py-3 text-center">
            <h3>Búsqueda avanzada</h3>
        </div>
        <div class="col-md-8 order-md-1">
            <div class="mb-3">
                <label>¿Que empleo búscas?</label>
                <input type="text" class="form-control" placeholder="Título o palabra clave">
            </div>
        </div>
        <hr class="mb-1">
        <!-- COLLAPSE-->
        <div class="row">
            <div class=" mt-2 col-sm-8">
            <h4 class="text-muted">Seleccionar tags de búsqueda</h4>
            <div class="list-group d-block" id="list-tab" role="tablist">
                <a class="list-group-item-action active" id="list-home-list" data-toggle="list" href="#a" role="tab" aria-controls="home">A</a>
                <a class="list-group-item-action" id="list-profile-list" data-toggle="list" href="#b" role="tab" aria-controls="profile">B</a>
                <a class="list-group-item-action" id="list-messages-list" data-toggle="list" href="#c" role="tab" aria-controls="messages">C</a>
                <a class=" list-group-item-action" id="list-settings-list" data-toggle="list" href="#d" role="tab" aria-controls="settings">D</a>
                <a class=" list-group-item-action" id="list-settings-list" data-toggle="list" href="#e" role="tab" aria-controls="settings">E</a>
                <a class="list-group-item-action" id="list-profile-list" data-toggle="list" href="#f" role="tab" aria-controls="profile">F</a>
                <a class="list-group-item-action" id="list-messages-list" data-toggle="list" href="#g" role="tab" aria-controls="messages">G</a>
                <a class=" list-group-item-action" id="list-settings-list" data-toggle="list" href="#h" role="tab" aria-controls="settings">H</a>
                <a class="list-group-item-action" id="list-profile-list" data-toggle="list" href="#i" role="tab" aria-controls="profile">I</a>
                <a class="list-group-item-action" id="list-messages-list" data-toggle="list" href="#j" role="tab" aria-controls="messages">J</a>
                <a class="list-group-item-action" id="list-settings-list" data-toggle="list" href="#k" role="tab" aria-controls="settings">K</a>
                <a class="list-group-item-action" id="list-profile-list" data-toggle="list" href="#l" role="tab" aria-controls="profile">L</a>
                <a class="list-group-item-action" id="list-messages-list" data-toggle="list" href="#m" role="tab" aria-controls="messages">M</a>
                <a class=" list-group-item-action" id="list-settings-list" data-toggle="list" href="n" role="tab" aria-controls="settings">N</a>
                <a class="list-group-item-action" id="list-profile-list" data-toggle="list" href="#o" role="tab" aria-controls="profile">O</a>
                <a class="list-group-item-action" id="list-messages-list" data-toggle="list" href="#p" role="tab" aria-controls="messages">P</a>
                <a class=" list-group-item-action" id="list-settings-list" data-toggle="list" href="#q" role="tab" aria-controls="settings">Q</a>
                <a class="list-group-item-action" id="list-profile-list" data-toggle="list" href="#r" role="tab" aria-controls="profile">R</a>
                <a class="list-group-item-action" id="list-messages-list" data-toggle="list" href="#s" role="tab" aria-controls="messages">S</a>
                <a class="list-group-item-action" id="list-settings-list" data-toggle="list" href="#t" role="tab" aria-controls="settings">T</a>
                <a class=" list-group-item-action" id="list-settings-list" data-toggle="list" href="#q" role="tab" aria-controls="settings">U</a>
                <a class="list-group-item-action" id="list-profile-list" data-toggle="list" href="#r" role="tab" aria-controls="profile">W</a>
                <a class="list-group-item-action" id="list-messages-list" data-toggle="list" href="#s" role="tab" aria-controls="messages">X</a>
                <a class="list-group-item-action" id="list-settings-list" data-toggle="list" href="#t" role="tab" aria-controls="settings">Y</a>
                <a class="list-group-item-action" id="list-settings-list" data-toggle="list" href="#t" role="tab" aria-controls="settings">Z</a>
            </div>
            <div class="tab-content " id="nav-tabContent">
                <div class="tab-pane fade show active" id="a" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="tags text-uppercase text-secondary">
                        @for ($i = 0; $i < 5; $i++)
                        <span id="tag" class="px-2  border rounded ">Programacion{{$i}}</span>
                        <span  class="px-2 border rounded ">php{{$i}}</span>
                        <span class="px-2  border rounded ">Programacion{{$i}}</span>
                        <span  class="px-2 border rounded ">php{{$i}}</span>
                        <span  class="px-2  border rounded ">laravel{{$i}}</span>
                        @endfor
                    </div>
                </div>
                <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                <div class="tab-pane fade" id="c" role="tabpanel" aria-labelledby="list-settings-list">...</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div>tagsseleccionados</diV>
        </div>
        </div>
    </div>

</main>
@endsection