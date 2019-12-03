@extends('admins.master')
<link href="{{asset('css/admin/empresas.css')}}" rel="stylesheet">
@section('body')

    <main role="main" class="col-md-12 py-0 px-0">
        
        <div class="conten col-md-10 ">
                <div class="title">
                        <h2>Ofertas de [Nombre empresa]</h2>
                </div>
                <div class="buscador">
                    <div class="div-buscador  flex-md-nowrap mt-6">
                        <div class="row div-search input-group search-group text-center pt-2 w-50 mb-1">
                            <input class="form-control form-control-dark " type="text" placeholder="Titulo oferta" aria-label="Search">
                            <div class="input-group-prepend">
                                <button class="btn btn-search my-sm-0" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="componet">
                    <a href="{{ route('admin.reg.ofr') }}">
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
                            <th scope="col" colspan="2" class="actions text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td scope="row">Voluptates dolor sit non occaecati dolorem.</td>
                            <td scope="row">Puerto Vallarta, Jalisco, México</td>
                            <td scope="row" class="actions">
                                <button class="btn btn-primary">
                                    Detalles
                                    <i class="fa fa-eye"></i> 
                                </button>
                            </td>
                            <td scope="row" class="actions">
                                <button class="btn btn-primary">
                                    Otros
                                    <i class="fa fa-archive"></i>    
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

@endsection
