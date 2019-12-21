@extends('admins.master')
@section('body')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{asset('css/perfil.css')}}" rel="stylesheet">
        <script src="{{asset('js/perfil.js')}}"type="text/javascript">

        </script>
        <main role="main">
            <div class="container">
                <div class="row">

                    <div class="information-personal col-md-4 order-md-1 mx-auto mt-4 mb-0">
                        <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 pt-4 shadow-sm h-md-250 position-relative">
                            
                            <div class="row">
                                <div class="col-md-12 content-logo">
                                    <div class="text-center mx-auto">
                                        <img class="foto-perfil" src="https://via.placeholder.com/200x200.png">
                                    </div>
                                    <div class=" mb-0 text-right mx-auto div-camera">
                                        <a href="#" class="btn-remove mx-1 px-1"><span class="fa fa-trash-o"></span></a>
                                        <a href="#" class="btn-upload mx-1 px-1"><span class="fa fa-upload"></span></a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="nombre-empresa mx-3 mt-0 pt-2">
                                        <h3 class="mb-0 text-center">
                                            <span>Comunicaciones Inteligentes del Pacifico</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <hr class="ml-4 mr-4">
                            <div class="row">
                                <h6 class="my-0 ml-4">DIRECCIÓN</h6>
                                <div class="col-md-12 ml-4 pr-5">
                                    <span class="text-muted">AV. INDEPENDENCIA NO. 241 COL. CENTRO TUXTEPEC</span><br>
                                    <span class="text-muted mr-5">
                                        <i class="fas fa-map-marker-alt"></i> Puerto Vallarta, Jalisco, México
                                    </span><br>  
                                </div>
                            </div>

                        </div>
                        <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 pt-4 shadow-sm h-md-250 position-relative">
                            
                            <h4 class="mx-3 mb-0">Información de contacto</h4>
                            <div class="ml-4">
                                <div id="DivContacto">
                                    <span id="LblEmail" class="text-muted">
                                        <i class="fa fa-envelope-o"></i>
                                         empresa@correo.com
                                    </span><br>
                                    <span id="LblTel"class="text-muted">
                                        <i class="fa fa-phone"></i>
                                         3221231212
                                    </span><br>
                                    <span id="LblTel"class="text-muted">
                                        <i class="fa fa-users"></i>
                                         Otro contacto
                                    </span><br>
                                    <span id="LblTel"class="text-muted">
                                        <i class="fa fa-id-card-o"></i>
                                         RAOL191220UD1
                                    </span><br>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class="profesional-information col-md-7 order-md-2 mx-auto mt-4">
                        <div class="no-gutters border rounded overflow-hidden flex-md-row shadow-sm h-md-250" novalidate>
                            
                           <div class="col-md-12">
                                {{--Componentes--}}
                                <div class="title text-center my-2">
                                    <h2>Ofertas de {{ $empresa->nombre }}</h2>
                                </div>
                                <div class="elementos col-md-12">
                                    <div class="row">
                                        <div class="buscador col-md-7 ml-4" >
                                            {!! Form::open(array('route'=>array('admin.det.emp2', $empresa->id),'method'=>'GET', 'id'=>'buscador')) !!}
                                            <div class="div-buscador  flex-md-nowrap mt-6">
                                                <div class="row div-search input-group search-group text-center pt-2 w-20 mb-1">
                                                    <input class="form-control form-control-dark" id="search" name="search" type="text" placeholder="Titulo oferta" aria-label="Search">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-search my-sm-0" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                        
                                        <div class="componet col-md-4" >
                                            <div class="text-right">
                                                <a href="{{ route('admin.reg.ofr', ['empresa' => $empresa->id, $empresa->nombre]) }}">
                                                    <button class="btn btn-primary add">
                                                        Nueva    
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--FIN Componentes--}}
                                {{--INICIO--}}
                                @forelse($ofertas as $oferta)
                                    <div class="div-oferta col-md-11 mx-auto mb-3 no-gutters border rounded overflow-hidden flex-md-row shadow-sm h-md-250" onclick="location.href='http://localhost:8000/veroferta/1?Oferta%201'" novalidate="">
                                        <div class="col-sm-12 px-3 pt-3"><h4 class="mb-0">{{ $oferta->titulo }}</h4></div>
                                        <div class="col-sm-12 px-3 mt-0 pt-0"><small class="text-muted text-uppercase">{{ $oferta->empresa->nombre }}</small></div>
                                        <div class="col-sm-12 px-3 mt-1">
                                            <p>
                                                {{ $oferta->d_corta }}
                                            </p>
                                        </div>
                                        <div class="row col-sm-12 px-3">
                                            <div class="col-sm-12">
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
                                            <div class="tags  col-sm-12 text-right pb-3 pr-0 mr-0">
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
                                            <div class="botones col-md-12 mb-0 ml-0 mr-1 text-right ">
                                                <button type="button " class=" form-inline icon btn btn-light "><img src="http://localhost:8000/images/icon/edit.png">Editar</button>
                                                <button type="button " class=" form-inline icon btn btn-light "><img src="">Otro</button>
                                            </div>
                                        </div>
                                    </div>
                                @empty{{-- Fin for-oferta --}}
                                    <div class="alert alert-info" role="alert">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> No se encontraron resultados.<br><br>
                                        <p>Te sugerimos:</p>
                                        <ul>
                                            <li>Utilizar palabras comunes o sinónimos</li>
                                            <li>Revisar la ortografía</li>
                                            <li>Realizar una nueva búsqueda</li>
                                        </ul>
                                    </div>
                                @endforelse
                                <div class="pagination">
                                    @if (!$ofertas->isEmpty())
                                        <div class="pag-message col-md-8 text-muted">
                                            Ofertas de la {{ $ofertas->firstItem() }} a la {{ $ofertas->lastItem() }} de un total de: {{ $ofertas->total() }}
                                        </div>
                                        <div class="pag-link col-md-4 right">
                                            {{ $ofertas->links() }}
                                        </div>
                                    @endif
                                </div>
                                {{--FIN--}}
                           </div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
@endsection
@section('scripts')

   <script src="{{asset('js/EditPerfil.js')}}"> </script>
@endsection