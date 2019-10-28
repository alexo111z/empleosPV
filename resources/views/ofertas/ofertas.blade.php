@extends('master')
<link href="{{asset('css/ofertas.css')}}" rel="stylesheet">
@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
dfvdfvdfvdfvd
            </div>
                
        </div>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 py-0 px-0">
             <!-- Main jumbotron for a primary marketing message or call to action -->
             <div class="jumbotron-navigation jumbotron">
                <div class="container text-center row">
                    <div class=" input-group search-group text-center mb-3">
                    <input type="text" class="form-control input-search" placeholder="Titulo o Palabra Clave" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <button class="btn btn-search my-2 my-sm-0" type="submit"><img class="icon-search" src="{{asset('images/icon/search.png')}}"></button>
                        </div>
                    </div>    
                              
                </div>
            </div>
        </main>
    </div>
</div>

@endsection