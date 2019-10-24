@extends('master')
@section('body')
        <link href="{{asset('css/perfil.css')}}" rel="stylesheet">
        <main role="main">
        <div class="row ml-4 mr-4">
            <div class="information-personal col-md-3 order-md-1 ml-3 mr-3 mt-4 mb-0">
                <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 pt-4 shadow-sm h-md-250 position-relative">    
                    <div class="text-center">
                        <img src="https://via.placeholder.com/200x200.png">
                    </div>
                    <div class="text-center  pt-4">
                        <h3 class="mb-0">
                            <span>María Guadalupe</span> 
                            <span>González Hernández </span>
                        </h3>
                    </div>
                    <hr class="ml-4 mr-4">
                    <div class="ml-4">
                        <h6 class="my-0">Fecha de nacimiento</h6>
                        <small class="text-muted">09/Mayo/1997</small>
                    </div>
                    <hr class="ml-4 mr-4">
                    <div class="ml-4">
                        <h6 class="my-0">Sexo</h6>
                        <small class="text-muted">Femenino</small>
                    </div>
                    <div class="text-right ">
                        <button type="button " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                    </div>
                </div>
                <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 pt-4 shadow-sm h-md-250 position-relative">    
                    <h4 class="ml-4">Información de contacto</h4>
                    <div class="ml-4">
                        <h6 class="my-0">Correo electrónco</h6>
                        <small class="text-muted">elodia.wolff.satura@gmail.com</small>
                    </div>
                    <hr class="ml-4 mr-4">
                    <div class="ml-4">
                        <h6 class="my-0">Telefono</h6>
                        <small class="text-muted">322 175 3228</small>
                    </div>
                    <div class="text-right ">
                        <button type="button " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                    </div>
                </div>
            </div>
            
            <div class="col-md-7 order-md-2 mt-4 ml-3 mr-3">
                
                <div class="no-gutters border rounded overflow-hidden flex-md-row shadow-sm h-md-250" novalidate>
                    <h4 class=" ml-4  mb-3 ">Formación académica</h4>    
                    <div class="row mr-4 ml-4">
                    
                        <div class="col-md-4 mb-3">
                            <h6>Nivel de estudios</h6>
                            <span>Universidad</span>
                        </div>
                        <div class="col-md-5 mb-3">
                            <h6>Área</h6>
                            <span>Sistemas Computacionales</span>
                            
                        </div>
                        <div class="col-md-3 mb-0 ml-0  text-right ">
                            <button type="button " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                        </div>
                    </div>
                </div>
                <div class="no-gutters border rounded overflow-hidden mt-2 flex-md-row shadow-sm h-md-250" novalidate>
                    <h4 class=" ml-4  mb-3 ">Información laboral</h4>    
                    <div class="row mr-4 ml-4">
                        <div class="col-md-12 mb-3">
                            <h6>Conocimientos</h6>
                            <blockquote>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </blockquote>
                            <div class="col-md-12 mb-0 ml-0  text-right ">
                                <button type="button " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                            </div>
                            <hr class="ml-3 mr-3">
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <h6>Habilidades (Tags)</h6>
                            <div class="tags text-uppercase text-secondary">
                                @for ($i = 0; $i < 5; $i++)
                                <span class="px-2  border rounded ">Programacion</span>
                                <span  class="px-2 border rounded ">php</span>
                                <span  class="px-2  border rounded ">laravel</span>
                                <span  class="px-2 border rounded ">php</span>
                                <span class="px-2  border rounded ">Programacion</span>
                                <span  class="px-2 border rounded ">php</span>
                                <span  class="px-2  border rounded ">laravel</span>
                                @endfor
                            </div>
                            <div class="col-md-12 mb-0 ml-0  text-right">
                                <button type="button " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/plus.png')}}">Agregar</button>
                            </div>
                            <hr class="ml-3 mr-3">
                        </div>
                        <div class="col-md-12 mb-3">
                            <h6>Curriculum</h6>
                            <div class="row mr-4 ml-4">
                                
                                <div class="col-md-5 mb-3 pl-0">
                                    <span><img src="{{asset('images/icon/file.png')}}"><a href="#">mi-curriculum.pdf</a><img src="{{asset('images/icon/remove.png')}}"></span>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <button type="button " class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/upload.png')}}">Subir</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-7 order-md-2 mt-4 ml-3 mr-3">
                
               
            </div>
        </div>
        </main>
@endsection