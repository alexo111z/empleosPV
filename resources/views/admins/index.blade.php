@extends('admins.master')
<link href="#" rel="stylesheet">
@section('body')

<main role="main" class="col-md-12 py-0 px-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center"><h3>Bienvenido</h3></div>
    
                    <div class="card-body">

                        <div class="datos">
                            <div class="row text-center">
                                <div class="col-md-12 text-center float-left">
                                    <h4 class="mx-0">
                                        <span>{{auth()->guard('admin')->user()->nombre ." ". auth()->guard('admin')->user()->apellido}}</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="text-right editButton">
                                <button type="button "id="BtnEditar"  class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar datos</button>
                            </div>
                            
                            <div class="no-gutters mt-4 border rounded overflow-hidden flex-md-row shadow-sm h-md-250" novalidate>
                                <h4 class=" ml-4  mt-3 mb-4 ">Opciones de cuenta</h4>
                                
                                <div class="mr-4 ml-4 mb-5">
                                    <div id="divCambio">
                                        <button data-toggle="modal" data-target="#password" id="passwordCambio" type="button" class="btn btn-outline-warning"><img src="{{asset('images/icon/edit.png')}}"> Cambiar contraseña</button><br>
                                        <span class="help-block text-danger mx-auto">{{ Session::get('message') }}</span>
                                        
                                        <span class="help-block text-danger mx-auto">
                                        @if($errors->any())
                                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                                        @endif
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="editar">
                            <h6 class="text-uppercase mx-auto">Modificar datos</h6>
                            <div class="ml-4 mb-2">  
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name">Nombre (s)</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->guard('admin')->user()->nombre }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido"  value="{{ auth()->guard('admin')->user()->apellido }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{ auth()->guard('admin')->user()->email }}" readonly>
                                </div>
                                
                                <hr class="mb-1">
                                <div class="tipo col-md-6 mb-3">
                                    <label for="tipo">Permisos</label>
                                    <input type="tipo" class="form-control" id="tipo" name="tipo" value="{{auth()->guard('admin')->user()->tipo?"Super Administrador":"Administrador"}}" readonly>
                                </div>
                            </div>
                            <div class="text-right Buttons">
                                <button type="button "id="BtnCancelar"  class=" form-inline icon btn btn-light ">Cancelar</button>
                                <button type="button "id="BtnGuardar" data-href="{{ route('admin.edit.admin', auth()->guard('admin')->user()->id) }}"  class=" form-inline icon btn btn-light ">Guardar</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{--  MODAL  --}}
    <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i>Cambiar contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="passwordChache" action="{{ route('admin.pass.admin') }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                    <div class="modal-body">
                        
                        <div class="col-md-8 mb-3">
                            <label for="password">Contraseña actual</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="nueva">Nueva contraseña</label>
                            <input type="text" class="form-control" id="nueva" name="nueva" required>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="nueva2">Repite contraseña</label>
                            <input type="text" class="form-control" id="nueva2" name="nueva2" required>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button  class="btn btn-primary" type="submit" >Cambiar</button>  
                    </div>
                </form>
            </div>
        </div>
    </div>


</main>

@endsection
@section('scripts')

   <script src="{{asset('js/EditarAdmin.js')}}"> </script>
@endsection