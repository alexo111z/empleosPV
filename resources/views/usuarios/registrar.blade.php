@extends('master')
<link href="{{asset('css/registrar.css')}}" rel="stylesheet">
@section('body')
	<main role="main">
        <div class="container">
            <div class="py-5 text-center">
                <h1 class="text-uppercase">Crea tu cuenta gratis</h1>
                <p class="lead">Hay ofertas de empleo esperandote</p>
            </div>
            
            <!-- start personal information -->
           <div class="col-md-8 order-md-1">
                <h4 class="mb-1">Datos de la cuenta</h4>
                <div class="mb-3">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="password2" placeholder="" value="" required>
                    </div>
                </div>
            </div>
            <hr class="mb-1">
            <div class="col-md-8 order-md-1">
                <h4 class="mb-1">Información Personal</h4>
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nombre (s)</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Apellido</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        </div>
                    </div>

                   
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Date">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="date" name="trip-start" value="2000-01-01" min="1960-01-01" max="2002-12-31">
                        </div>
                        <div class="col-md-6 mb-3">
                        <label  for="Date">Sexo</label>
                            <div class="col-md-2 mb-2">
                                <div class="custom-control custom-radio">
                                <input id="credit" name="sexo" type="radio" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit">Femenino</label>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="sexo" type="radio" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit">Masculino</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-1">
                    <h4 class="mb-1">Formación académica</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nivel de estudios</label>
                            <select class="form-control">
                                <option value="volvo">Primaria</option>
                                <option value="saab">Secundaria</option>
                                <option value="mercedes">Preparatoria</option>
                                <option value="audi">Universidad</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Área</label>
                            <select class="form-control">
                                <option value="volvo">Primaria</option>
                                <option value="saab">Secundaria</option>
                                <option value="mercedes">Preparatoria</option>
                                <option value="audi">Universidad</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <button class="btn btn-register btn-lg btn-block" type="submit">Registrar cuenta</button>
                    </div>
                    
                </form>
                </div>
        </div>
    </main>
@endsection