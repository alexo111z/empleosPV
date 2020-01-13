@extends('admins.master')
<link href="{{asset('css/admin/empresas.css')}}" rel="stylesheet">
@section('body')

    <main role="main" class="col-md-12 py-0 px-0">
        
        <div class="conten col-md-10 ">
                <div class="title">
                        <h2>Administradores</h2>
                </div>
                {!! Form::open(array('route'=>'admin.admins','method'=>'GET', 'id'=>'buscador')) !!}
                <div class="buscador">
                    <div class="div-buscador  flex-md-nowrap mt-6">
                        <div class="row div-search input-group search-group text-center pt-2 w-50 mb-1">
                            <input class="form-control form-control-dark" id="search" name="search" type="text" placeholder="Nombre" aria-label="Search">
                            <div class="input-group-prepend">
                                <button class="btn btn-search my-sm-0" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <div class="componet">
                    <a href="{{ route('admin.reg.admin') }}">
                        <button class="btn btn-primary add">
                            Nuevo administrador    
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
                        @if ($admins->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">No se encontraron usuarios administradores</td>
                            </tr>
                        @endif
                        @foreach ($admins as $adm)
                            <tr>
                                <td scope="row">{{ $adm->id }}</td>
                                <td scope="row">{{ $adm->nombre }} {{ $adm->apellido }}</td>
                                <td scope="row">{{ $adm->email }}</td>
                                <td scope="row" class="actions">
                                    <a href="{{ route('admin.det.admin', ['admin'=>$adm->id]) }}">
                                        <button class="btn btn-primary">
                                            Detalles
                                            <i class="fa fa-user"></i> 
                                        </button>
                                    </a>
                                </td>
                                {{--<td scope="row" class="actions">
                                    <button class="btn btn-primary">
                                        Otros
                                        <i class="fa fa-archive"></i>    
                                    </button>
                                </td>--}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                @if (!$admins->isEmpty())
                    <div class="message col-md-10 text-muted">
                        Administradores del {{ $admins->firstItem() }} al {{ $admins->lastItem() }} de un total de: {{ $admins->total() }}
                    </div>
                    <div class="element col-md-2 right">
                        {{ $admins->links() }}
                    </div>
                @endif
            </div>
        </div>

    </main>

@endsection
