@extends('admins.master')
<link href="{{asset('css/admin/empresas.css')}}" rel="stylesheet">
@section('body')

    <main role="main" class="col-md-12 py-0 px-0">
        
        <div class="conten col-md-10 ">
                <div class="title">
                        <h2>Empresas</h2>
                </div>
                {!! Form::open(array('route'=>'admin.emp','method'=>'GET', 'id'=>'buscador')) !!}
                <div class="buscador">
                    <div class="div-buscador  flex-md-nowrap mt-6">
                        <div class="row div-search input-group search-group text-center pt-2 w-50 mb-1">
                            <input class="form-control form-control-dark" id="search" name="search" type="text" placeholder="Nombre empresa" aria-label="Search">
                            <div class="input-group-prepend">
                                <button class="btn btn-search my-sm-0" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <div class="componet">
                    <a href="{{ route('admin.reg.emp') }}">
                        <button class="btn btn-primary add">
                            Registrar empresa    
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
                            <th scope="col">Otro dato</th>
                            <th scope="col" colspan="2" class="actions text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($empresas->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">No se encontraron ofertas</td>
                            </tr>
                        @endif
                        @foreach ($empresas as $emp)
                            <tr>
                                <td scope="row">{{ $emp->id }}</td>
                                <td scope="row">{{ $emp->nombre }}</td>
                                <td scope="row">{{ $emp->email }}</td>
                                <td scope="row" class="actions">
                                    <a href="{{ route('admin.det.emp', ['empresa'=>$emp->id, $emp->nombre]) }}">
                                        <button class="btn btn-primary">
                                            Detalles
                                            <i class="fa fa-building"></i> 
                                        </button>
                                    </a>
                                </td>
                                <td scope="row" class="actions">
                                    <a href="{{ route('admin.emp.ofr', ['empresa' => $emp->id, $emp->nombre]) }}">
                                        <button class="btn btn-primary">
                                            Ofertas
                                            <i class="fa fa-bars"></i>    
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                @if (!$empresas->isEmpty())
                    <div class="message col-md-10 text-muted">
                        Empresas del {{ $empresas->firstItem() }} al {{ $empresas->lastItem() }} de un total de: {{ $empresas->total() }}
                    </div>
                    <div class="element col-md-2 right">
                        {{ $empresas->links() }}
                    </div>
                @endif
            </div>
        </div>

    </main>

@endsection
@section('scripts')
   {{--<script src="{{asset('js/EditPerfil.js')}}"> </script>--}}
@endsection