@extends('admins.master')
@section('body')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{asset('css/perfil.css')}}" rel="stylesheet">
        <script src="{{asset('js/perfil.js')}}"type="text/javascript">

        </script>
        <main role="main">
            <div class="container px-auto">
                <div class="row px-auto">

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
                            
                            2 arriba

                        </div>
                        <div class="no-gutters border rounded overflow-hidden mt-2 flex-md-row shadow-sm h-md-250" novalidate>
                         
                            2 abajo
                        
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
@endsection
@section('scripts')

   <script src="{{asset('js/EditPerfil.js')}}"> </script>
@endsection