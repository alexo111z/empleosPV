<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>PV-WORK</title>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700|K2D:200,400,700,800&display=swap" rel="stylesheet">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        
        <!-- Custom styles for this template -->
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark" >
                <a class="navbar-brand" href="#"> <img src="{{asset('images/images/logo-white.png')}}" width="125" height="35" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Buscar Empleos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Soy Empresa</a>
                        </li>
                    </ul>
                    <div class="form-inline ">
                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item"><a class="nav-link" href="#">!Registrate ya!</a></li>
                            <li class="nav-item"><a class="btn btn-login btn-outline-secondary" href="#">Iniciar Sesión</a></li>
                         <ul>
                    </div>
                </div>
            </nav>
        </header>
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
                    <p><a class="btn btn-more" href="#" role="button">Inicia Sesión</a></p>
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
                    <p><a class="btn btn-more" href="#" role="button">Inicia Sesión</a></p>
                    <p>Si no tienes cuenta <a class="link-register" href="#" >Registrate Aquí</a></p>
                </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div>
              <!-- FOOTER -->
            <hr class="featurette-divider">
            <footer class="text-muted text-center text-small">
                <p class="mb-1 text-uppercase">&copy; 2019 comunicaciones inteligentes del pacífico</p>
            </footer>
        </main>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>