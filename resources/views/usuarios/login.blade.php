@extends('master')
	@section('body')
	
	<link href="{{asset('css/login.css')}}" rel="stylesheet">
		<main role="main">
		<div class="container h-100">
			<div class="d-flex justify-content-center h-100">
				<div class="user_card">
					<div class="form-title text-center align-middle">
						<h1 class="text-uppercase">Inicio de sesión</h1>
						<h6>Ingresa y encuentra el empleo que deseas</h6>
					</div>
					<div class="d-flex justify-content-center form_container">
						
						<form class="form-signin">
							
							<div class="input-group mb-3">
								<input type="text" name="" class="form-control" value="" placeholder="Correo electrónico">
							</div>
							<div class="input-group mb-2">
								<input type="password" name="" class="form-control" value="" placeholder="Contraseña">		
							</div>
							
							<div class="form-group text-center">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck" >
								<label class="custom-control-label" for="customCheck">Mantener sesión iniciada</label>
							</div>
							</div>
						</form>
					</div>
					<div class="d-flex justify-content-center mt-3 login_container">
						<button type="button" name="button" class="btn login_btn">Iniciar Sesión</button>
					</div>
					<div class="mt-4">
						<div class="link-password">
								<a href="#">¿Olvidaste tu contraseña?</a>
							</div>
						<div class="d-flex justify-content-center links">
							<p>Si no tienes cuenta </p> <a href="#" class="ml-2">Registrate Aquí</a>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
		</main>
	@endsection