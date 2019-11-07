@extends('master')
<link href="{{asset('css/ofertas.css')}}" rel="stylesheet">
<script src="{{asset('js/ofertas.js')}}"type="text/javascript">

</script>
@section('body')

    <main role="main">
        <nav class="nav-buscador navbar  flex-md-nowrap py-1 mt-6">
        <div class="row div-search input-group search-group text-center mx-auto w-50 my-1">
            <input class="form-control mx-auto form-control-dark " type="text" placeholder="Busca empleos ahora" aria-label="Search">
            
            <div class="input-group-prepend">
                <button class="btn btn-search my-sm-0" type="submit"><img class="icon-search" src="{{asset('images/icon/search.png')}}"></button>
            </div>
            <div class="col-md-12 text-right">
                <a id="link-busqueda" href="#"  onclick="javascript:mostrar_busqueda();">Búsqueda avanzada>></a>
            </div>
            <div class="col-md-12 text-right">
                <a id="link-cancelar" href="#"  onclick="javascript:ocultar_busqueda();">Cerrar tags <strong>X</strong></a>
            </div>
        </div>
        </nav>
        <div id="busqueda-avanzada" class="jumbotron jumbotron-fluid py-0">
            <div class="container">
                <!-- COLLAPSE-->
                <div class="text-center">
                    <h6>Seleccionar tags para búsqueda</h6>
                    <div class="list-group d-block text-center" id="list-tab" role="tablist">
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
                    <a class=" list-group-item-action" id="list-settings-list" data-toggle="list" href="#u" role="tab" aria-controls="settings">U</a>
                    <a class="list-group-item-action" id="list-profile-list" data-toggle="list" href="#w" role="tab" aria-controls="profile">W</a>
                    <a class="list-group-item-action" id="list-messages-list" data-toggle="list" href="#x" role="tab" aria-controls="messages">X</a>
                    <a class="list-group-item-action" id="list-settings-list" data-toggle="list" href="#y" role="tab" aria-controls="settings">Y</a>
                    <a class="list-group-item-action" id="list-settings-list" data-toggle="list" href="#z" role="tab" aria-controls="settings">Z</a>
                    </div>
                </div>
                <div class="pb-1">
                    <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="a" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="tags text-uppercase text-secondary">
                                @for ($i = 0; $i < 50; $i++)
                                <span id="tag" class="px-2  border rounded ">Programacion{{$i}}</span>
                                <span  class="px-2 border rounded ">php{{$i}}</span>
                                <span class="px-2  border rounded ">Programacion{{$i}}</span>
                                <span  class="px-2 border rounded ">php{{$i}}</span>
                                <span  class="px-2  border rounded ">laravel{{$i}}</span>
                                @endfor
                        </div>
                    </div>
                            
                    <div class="tab-pane fade" id="" role="tabpanel" aria-labelledby="list-profile-list">
                            
                    </div>
                    <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="list-messages-list">tags b</div>
                    <div class="tab-pane fade" id="c" role="tabpanel" aria-labelledby="list-settings-list">tags c</div>
                    </div>
                </div>

                <!-- COLLAPSE-->
            </div>
            </div>
    </main>


@endsection