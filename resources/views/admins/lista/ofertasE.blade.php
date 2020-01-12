@extends('admins.master')
<link href="{{asset('css/admin/empresas.css')}}" rel="stylesheet">
@section('body')

    <main role="main" class="col-md-12 py-0 px-0">
        
        <div class="conten col-md-10 ">
                <div class="title">
                        <h2>Ofertas de {{ $ofertas[0]->empresa->nombre }}</h2>
                </div>
                {!! Form::open(array('route'=>array('admin.emp.ofr', $ofertas[0]->empresa->id),'method'=>'GET', 'id'=>'buscador')) !!}
                <div class="buscador">
                    <div class="div-buscador  flex-md-nowrap mt-6">
                        <div class="row div-search input-group search-group text-center pt-2 w-50 mb-1">
                            <input class="form-control form-control-dark" id="search" name="search" type="text" placeholder="Titulo oferta" aria-label="Search">
                            <div class="input-group-prepend">
                                <button class="btn btn-search my-sm-0" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <div class="componet">
                    <a href="{{ route('admin.reg.ofr', ['empresa' => $ofertas[0]->empresa->id, $ofertas[0]->empresa->nombre]) }}">
                        <button class="btn btn-primary add">
                            Crear oferta    
                            <i class="fa fa-plus"></i>
                        </button>
                    </a>
                </div>
            <div class="data-table">
                <table class="table data">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Lugar de la oferta</th>
                            <th scope="col">Vigencia</th>
                            <th scope="col" colspan="2" class="actions text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($ofertas->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">No se encontraron ofertas</td>
                            </tr>
                        @endif
                        @foreach ($ofertas as $ofer)
                            <tr>
                                <td scope="row">{{ $ofer->id }}</td>
                                <td scope="row">{{ $ofer->titulo }}</td>
                                <td scope="row">{{ $ofer->idciudad->municipio }}, {{$ofer->idestado->estado}}, {{$ofer->idpais->pais}}</td>
                                <td scope="row">
                                <div class="d-flex text-center">
                                    @if(!$ofer->existe)
                                        <div class="w-30 py-1 my-0 px-auto text-center alert alert-danger text-danger " role="alert">
                                            <small>Eliminado</small>
                                        </div>
                                    @else
                                        @if((Date::createFromFormat('Y-m-d H:i:s', $ofer->vigencia)->greaterThan(Carbon\Carbon::now())))
                                            <div class="w-30 py-1 my-0 px-auto text-center alert alert-success text-success " role="alert">
                                                <small>Vigente</small>
                                            </div> 
                                        @else
                                            <div class="w-30 py-1 my-0 px-auto text-center alert alert-danger text-danger " role="alert">
                                                <small>No Vigente</small>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                </td>
                                <td scope="row" class="actions">
                                    <a href="{{ route('admin.det.ofr', ['oferta'=>$ofer->id, $ofer->titulo]) }}">
                                        <button class="btn btn-primary">
                                            Detalles
                                            <i class="fa fa-eye"></i> 
                                        </button>
                                    </a>
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
                @if (!$ofertas->isEmpty())
                    <div class="message col-md-10 text-muted">
                        Ofertas de la {{ $ofertas->firstItem() }} a la {{ $ofertas->lastItem() }} de un total de: {{ $ofertas->total() }}
                    </div>
                    <div class="element col-md-2 right">
                        {{ $ofertas->links() }}
                    </div>
                @endif
            </div>
        </div>

    </main>

@endsection
