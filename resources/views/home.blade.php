@extends('master')
    @section('body')
        <link href="{{asset('css/home.css')}}" rel="stylesheet">
        <main role="main">
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron" style="background-image:url({{asset('images/images/office.jpg')}});">
                <div class="container text-center">
                    <h6 class="little-title text-uppercase">Encuentra empleos en Puerto Vallarta sin salir de tu casa</h6>
                    <h1 class="title display-3 text-uppercase">Busca Empleo Ahora</h1>
                    <div class="input-group search-group text-center mb-3">
                        <input type="text" class="form-control input-search" placeholder="Titulo o Palabra Clave" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <button class="btn btn-search my-2 my-sm-0" type="submit"><img class="icon-search" src="{{asset('images/icon/search.png')}}"></button>
                        </div>
                    </div>    
                              
                </div>
            </div>
            <div class="container marketing">
            <div class="row text-center">
                <div class="col-lg-4" >
                    <img  class="img-publicity"src="{{asset('images/images/postular.png')}}" >                
                    <h2 class="title-item">Postulate y aumenta tus posibilidades</h2>
                    <p>Solicita los empleos que más te gustan, para aumenta las posibilidades de que las empresas se pongan en contacto contigo</p>
                    <p>Si no tienes cuenta <a class="link-register" href="#" >Registrate Aquí</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img  class="img-publicity"src="{{asset('images/images/app.png')}}" >
                    <h2 class="title-item">¡Descarga nuestra app!</h2><br>
                    <p>Busca empleos en cualquier lugar desde tu dispositivo móvil, así podrás postularte antes que nadie.</p>
                    <p><a class="btn btn-more" href="#" role="button">Descargar App</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img  class="img-publicity"src="{{asset('images/images/search-person.png')}}" >
                    <h2 class="title-item">¿Estas búscando empleados?</h2><br>
                    <p>Publica tus ofertas de empleo fácil y rápido. Ademas podrás ver los perfiles laborales y su calificación como trabajadores.</p>
                    <p>Si no tienes cuenta <a class="link-register" href="#" >Registrate Aquí</a></p>
                </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div>
        </main>
    @endsection
