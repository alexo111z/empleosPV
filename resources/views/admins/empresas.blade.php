@extends('admins.master')
<link href="{{asset('css/admin/empresas.css')}}" rel="stylesheet">
@section('body')

    <main role="main" class="col-md-12 py-0 px-0">
        
        
        <div class="conten col-md-10 ">
                <div class="buscador">
                    <div class="div-buscador  flex-md-nowrap mt-6">
                        <div class="row div-search input-group search-group text-center pt-2 w-50 mb-1">
                            <input class="form-control form-control-dark " type="text" placeholder="Nombre empresa" aria-label="Search">
                            <div class="input-group-prepend">
                                <button class="btn btn-search my-sm-0" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="componet">
                        <button class="btn btn-primary add">
                            Agregar empresa    
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
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
                    <tr>
                        <td scope="row">1</td>
                        <td scope="row">empresa</td>
                        <td scope="row">nalkfnalkfn</td>
                        <td scope="row" class="actions">
                            <button class="btn btn-primary">
                                Detalles
                                <i class="fa fa-building"></i> 
                            </button>
                        </td>
                        <td scope="row" class="actions">
                            <button class="btn btn-primary">
                                Ofertas
                                <i class="fa fa-bars"></i>    
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>

@endsection
