
       <header>
        @section('header')
            <nav class="navbar navbar-expand-lg navbar-dark" >
                <a class="navbar-brand" href="{{route('home')}}"> <img src="{{asset('images/images/logo-white.png')}}" width="125" height="35" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ofertas.lista')}}">Buscar Empleos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Soy Empresa</a>
                        </li>
                    </ul>
                    <div class="form-inline ">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a class="nav-link" href="#">!Registrate ya!</a></li>
                            <li class="nav-item"><a class="btn btn-login btn-outline-secondary" href="{{route('usuarios.login')}}">Iniciar Sesión</a></li>
                         <ul>
                    </div>
                </div>
            </nav>
        @endsection
        @section('header-user')
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark " >
                <a class="navbar-brand" href="{{route('ofertas.lista')}}"> <img src="{{asset('images/images/logo-white.png')}}" width="125" height="35" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ofertas.lista')}}">Buscar Empleos</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{route('postulaciones')}}">Mis postulaciones</a></li>
                    </ul>
                    @guest
                        <div class="form-inline ">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown show">
                                    <a class="btn btn-login dropdown-toggle" href="{{ route('usuarios.login') }}" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Inicia sesión
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{route('usuarios.login')}}">Iniciar sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @else
                    <div class="form-inline ">
                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item dropdown show">
                                <a class="btn btn-login dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="icon-profile" src="https://via.placeholder.com/30x30.png">{{ auth()->user()->fullname }}<!--María Guadalupe-->
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('usuarios.perfil')}}">Mi perfil</a>
                                    <a class="dropdown-item" href="#">Cambiar contraseña</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                                </div>
                            </li>
                         </ul>
                    </div>
                    @endguest
                </div>
            </nav>
            @endsection
        </header>
