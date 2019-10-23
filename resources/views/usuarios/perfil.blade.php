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
            </div>
        </div>
        </main>
@endsection