@extends('master')
<link href="{{asset('css/busqueda.css')}}" rel="stylesheet">
@section('body')
<main role="main">
    <nav class="nav-buscador navbar  flex-md-nowrap mt-6">
        <div class="row div-search input-group search-group text-leftpt-2 w-50 mb-1">
            <a class="regresar" href="{{route('ofertas.lista')}}"><i class="	fas fa-arrow-left"></i> volver</a>
        </div>   
    </nav>
    {!! Form::open(array('url'=>"/ofertas/34",'method'=>'POST', 'id'=>'buscador')) !!}
    <div class="container">
        <div class="py-3 text-center">
            <h3>Búsqueda avanzada</h3>
        </div>
        <div class="row col-sm12 order-md-1">
            <div class="col-sm-7 mb-3">
                <label>¿Que empleo búscas?</label>
                <input id="inputtitulo" name="inputtitulo"type="text" class="form-control" placeholder="Título o palabra clave">
            </div>
            <div class="col-sm-5 mb-3">
                <label>¿Que sueldo búscas ganar?</label>
                <select name="selsueldo" class="form-control">
                    <option >Sin sueldo específico</option>
                    <option >Menor a $1000</option>
                    <option >Entre $1000 - $4000</option>
                    <option >Entre $4000 - $6500</option>
                    <option >Entre $6500 - $10000</option>
                    <option >Mas de $10000</option>
                </select>
            </div>
        </div>
        
        <hr class="mb-1">
        <!-- COLLAPSE-->
        <div class="row">
            
            <div class=" mt-2 col-sm-8 ">
                <h4 class="text-muted">Seleccionar tags de búsqueda</h4>
                <div class="list-group d-block" id="list-tab" role="tablist">
                    <?php
                        $abecedario=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'); 
                        foreach($abecedario AS $letra){ 
                            if($letra<>'A'){
                                echo "<a class='list-group-item-action  ml-1' id='list-$letra' data-toggle='list' href='#$letra' role='tab'>".$letra."</a>";
                            }else{
                                echo "<a class='list-group-item-action active ml-1' id='list-$letra' data-toggle='list' href='#$letra' role='tab'>".$letra."</a>";
                            }
                        }
                    ?>
                </div>
                <div class="tab-content " id="nav-tabContent">
                    <?php
                       foreach($abecedario AS $letra){ 
                            if($letra<>'A'){
                                echo "<div class='tab-pane fade show' id='$letra' role='tabpanel'><div class='tags text-secondary'>";
                            }else{
                                echo "<div class='tab-pane fade show active' id='$letra' role='tabpanel'><div class='tags text-secondary'>";
                                    
                            }
                            $existe=true;
                            //Poner tags
                            foreach($tags as $tag){
                                if(strpos($tag->nombre, strtolower ($letra))==" "){
                                    echo" <span class='tag px-2  text-lowercase  border rounded' id='$tag->id'> $tag->nombre</span>";
                                    $existe=false;
                                }
                            }
                            if($existe){
                                echo" <span><i class='fa fa-info-circle' aria-hidden='true'></i> No hay tags registrados con esta letra.</span>";
                            }
                            echo "</div></div>";
                        }
                    ?>
                </div>
            </div>
            <div class="col-sm-4 order-md-2 ">
                <div class="no-gutters border rounded overflow-hidden mt-2 flex-md-row shadow-sm h-md-250" novalidate>
                    <div class="title-tags col-sm-12 text-center py-1">
                        <span>Tags seleccionados</span>
                    </div>
                    <div id="addtag" class="tags-container tags text-secondary col-sm-12 px-2 py-1">
                        <!--Tags seleccionados-->
                    </div>
                </diV>
                <div class="col-sm-12 my-3 px-0 text-center">
                    <button class="btn btn-buscar " ><i class="fas fa-search"></i> Buscar ahora</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</main>
@endsection
@section('scripts')

   <script src="{{asset('js/busqueda.js')}}"> </script>
@endsection