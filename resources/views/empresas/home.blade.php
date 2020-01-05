@extends('empresas.master')
<link href="{{asset('css/home.css')}}" rel="stylesheet">
    @section('body')
    <main role="main" class="col-md-12 py-0 px-0">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron pb-4 " style="background-image:url({{asset('images/images/empleados.jpg')}});">
            <div class="container text-center">
                <h6 class="little-title text-uppercase">Pública tus ofertas y encuentra al candidato perfecto.</h6>  
                <h1 class="title mb-4 text-uppercase">Tu próximo empleado está aquí. </h1>
                <a class="btn mt-5 btn-more" href="#" role="button">Publicar oferta ahora</a>   
            </div>
        </div>
        <div class="container marketing">
            <div class="row text-center pt-5 ">
                <div class="col-lg-4" >
                    <img  class="img-publicity"src="{{asset('images/images/publicar.png')}}" >                
                    <h2 class="title-item">Publica tus ofertas.</h2>
                    <p>Pública tus ofertas de empleo, puedes personalizar tu publicación mediante el uso de tags para obtener más postulaciones.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img  class="img-publicity"src="{{asset('images/images/postulaciones.png')}}" >
                    <h2 class="title-item">Recibe las postulaciones.</h2>
                    <p>Recibe las postulaciones de los usuarios interesados, así como su perfil y curriculum para conocer más de su historial laboral.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img  class="img-publicity"src="{{asset('images/images/seleccion.png')}}" >
                    <h2 class="title-item">Selecciona al mejor talento</h2>
                    <p>Selecciona al mejor postulante, la información de su perfil y la calificación que tenga como empleado te ayudarán a tomar esta desición.</p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div>
        </main>
    @endsection
