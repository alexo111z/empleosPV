@extends('admins.master')
<link href="{{asset('css/admin/empresas.css')}}" rel="stylesheet">
@section('body')

    <main role="main" class="col-md-12 py-0 px-0">
        
        <div class="conten col-md-10 ">
                <div class="title">
                        <h2>Usuarios</h2>
                </div>
                {!! Form::open(array('route'=>'admin.users','method'=>'GET', 'id'=>'buscador')) !!}
                <div class="buscador">
                    <div class="div-buscador  flex-md-nowrap mt-6">
                        <div class="row div-search input-group search-group text-center pt-2 w-50 mb-1">
                            <input class="form-control form-control-dark" id="search" name="search" type="text" placeholder="Usuario..." aria-label="Search">
                            <div class="input-group-prepend">
                                <button class="btn btn-search my-sm-0" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <div class="componet">
                    <a href="{{ route('admin.reg.user') }}">
                        <button class="btn btn-primary add">
                            Registrar usuario    
                            <i class="fa fa-plus"></i>
                        </button>
                    </a>
                </div>
            <div class="data-table">
                <table class="table data">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col" colspan="2" class="actions text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">No se encontraron usuarios</td>
                            </tr>
                        @endif
                        @foreach ($users as $usr)
                            <tr>
                                <td scope="row">{{ $usr->id }}</td>
                                <td scope="row">{{ $usr->nombre }} {{ $usr->apellido }}</td>
                                <td scope="row">{{ $usr->email }}</td>
                                <td scope="row" class="actions">
                                    {!! Form::open(array('route'=>array('admin.det.user', $usr->id),'method'=>'GET', 'id'=>'buscador')) !!}
                                    <button class="btn btn-primary" type="submit">
                                        Detalles
                                        <i class="fa fa-user"></i> 
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                                <td scope="row" class="actions">
                                    <button class="btn btn-primary">
                                        Otros
                                        <i class="fa fa-archive"></i>    
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                @if (!$users->isEmpty())
                    <div class="message col-md-10 text-muted">
                        Usuarios del {{ $users->firstItem() }} al {{ $users->lastItem() }} de un total de: {{ $users->total() }}
                    </div>
                    <div class="element col-md-2 right">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        </div>

    </main>

@endsection
