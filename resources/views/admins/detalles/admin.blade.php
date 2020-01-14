@extends('admins.master')
<link href="{{asset('css/admin/veroferta.css')}}" rel="stylesheet">

@section('body')
<main role="main">
    <nav class="nav-buscador navbar  flex-md-nowrap mt-6">
        <div class="row div-search input-group search-group text-leftpt-2 w-50 mb-1">
            <a class="regresar" href="{{URL::previous()}}"><i class="	fas fa-arrow-left"></i> volver</a>
        </div>
    </nav>

    <main role="main" class="col-md-12 py-0 px-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header text-center">{{ $admin->tipo ? "Super Administrador": "Administrador" }}</div>
        
                        <div class="card-body">

                            <div class="datos">
                                <div class="row text-center">
                                    <div class="col-md-12 text-center float-left">
                                        <h4 class="mx-0">
                                            <span>{{$admin->nombre ." ". $admin->apellido}}</span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12 text-center float-left">
                                        <h4 class="mx-0">
                                            <span>{{$admin->email}}</span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="text-right editButton">
                                    <button type="button "id="BtnEditar"  class=" form-inline icon btn btn-light "><img src="{{asset('images/icon/edit.png')}}">Editar</button>
                                </div>

                                <div class="no-gutters mt-4 border rounded overflow-hidden flex-md-row shadow-sm h-md-250" novalidate>
                                    <h4 class=" ml-4  mt-3 mb-4 ">Opciones de cuenta</h4>
                                    
                                    <div class="mr-4 ml-4 mb-5">
                                        <div id="divBaja">
                                            <button data-toggle="modal" data-target="#confirmbaja" id="btnBaja" type="button" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Dar de baja esta cuenta</button><br>
                                            <span class="text-danger col-sm-12 pl-0"><i class="fa fa-info-circle" aria-hidden="true"></i> Esta opción le permite dar de baja la cuenta, sin embargo una vez dada de baja ya no sera posible ingresar a esta.</span>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="editar">
                            <form id="form-edit" action="{{ route('admin.edit.admin', auth()->guard('admin')->user()->id) }}" method="post">
                                <h6 class="text-uppercase mx-auto">Modificar datos</h6>
                                <div class="ml-4 mb-2">  
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name">Nombre (s)</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $admin->nombre }}" required>
                                        </div>
                                        <div class="col-md-6 pl-0">
                                            <label for="apellido">Apellido</label>
                                            <input type="text" class="form-control" id="apellido" name="apellido"  value="{{ $admin->apellido }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pl-0">
                                        <label for="email">Correo electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{ $admin->email }}" readonly>
                                    </div>
                                    
                                    <hr class="mb-1">
                                    <div class="tipo col-md-6 mb-3 pl-0">
                                        <label for="tipo">Permisos</label>
                                        <select name="tipo" id="tipo" class="form-control">
                                            <option selected hidden value="{{$admin->tipo}}">{{$admin->tipo?"Super Administrador":"Administrador"}}</option>
                                            <option value="0">Administrador</option>
                                            <option value="1">Super Administrador</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-right Buttons">
                                    <button type="button "id="BtnCancelar"  class=" form-inline icon btn btn-light ">Cancelar</button>
                                    <button type="submit"id="BtnGuardar" data-href="{{ route('admin.edit.admin', $admin->id) }}"  class=" form-inline icon btn btn-light ">Guardar</button>
                                </div>
                            </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    {{--  MODAL  --}}
    <div class="modal fade" id="confirmbaja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> ¿Esta seguro que desea dar de baja esta cuenta?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="text-danger"><i class="fas fa-info-circle"></i>Una vez que se da de baja la cuenta ya no sera posible ingresar a está.</span>
                </div>
                <div class="modal-footer">
                    <form id="form-delete" name="form-delete" method="POST" action="{{route('admin.del.admin',['id' => $admin->id])}}">
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button data-href="{{route('admin.del.admin',['id' => $admin->id])}}" id="delete-admin" type="submit"  class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i> Dar de baja</button>  
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
@section('scripts')

   <script src="{{asset('js/EditarAdmin.js')}}"> </script>
@endsection