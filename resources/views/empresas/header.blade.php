
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark " >
    @guest('empresa')
        <a class="navbar-brand" href="{{route('empresas.index')}}"> <img src="{{asset('images/images/logo-white.png')}}" width="125" height="35" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-end" id="navbarColor03">
            
            <div class="mr-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('empresas.registrar')}}">!Registrate ya!</a></li>
                    <li class="nav-item"><a class="btn btn-login btn-outline-secondary" href="{{route('empresas.login')}}">Iniciar Sesión</a></li>
                <ul>
            </div>
           
        </div>
        @else
        <a class="navbar-brand" href="{{route('empresas.index')}}"> <img src="{{asset('images/images/logo-white.png')}}" width="125" height="35" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('misofertas')}}">Mis ofertas</a>
                        </li>
                    </ul>
                    <div class="form-inline ">
                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item dropdown show">
                                <a class="btn btn-login dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{--auth()->guard('empresa')->user()->nombre--}}
                                    @if(isset(auth()->guard('empresa')->user()->logo))
                                    <img class="icon-profile" src="{{ route('empresas.logo',['file'=>auth()->guard('empresa')->user()->logo]) }}">{{ auth()->guard('empresa')->user()->nombre }}<!--María Guadalupe-->
                                    @else
                                    <img class="icon-profile" src="{{ route('empresas.logo',['file'=>'empresa.png']) }}">{{ auth()->guard('empresa')->user()->nombre }}<!--María Guadalupe-->
                                    @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('empresas.perfil')}}">Mi perfil</a>
                                     <a class="dropdown-item" href="{{route('empresas.logout')}}" >Cerrar sesión</a>

                                </div>
                            </li>
                         </ul>
                </div>
        @endguest
    </nav>
</header>
     
