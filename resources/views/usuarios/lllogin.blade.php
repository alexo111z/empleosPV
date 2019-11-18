@extends('master')
	@section('body')
	
	<link href="{{asset('css/login.css')}}" rel="stylesheet">
		<main role="main">
		<div class="container mb-2">
			<div class="d-flex justify-content-center h-100">
				<div class="user_card">
					<div class="form-title text-center align-middle">
						<h1 class="text-uppercase">Inicio de sesión</h1>
						<h6>Ingresa y encuentra el empleo que deseas</h6>
					</div>
					<div class="form_container">
						<form   method="post" action="">
							<div class="form-label-group">
								<input type="email" id="inputEmail" class="form-control" placeholder="Correo electrónico" required autofocus>
							</div>
							<div class="form-label-group">
								<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
							</div>
							<div class="checkbox mb-3">
								<label>
								<input type="checkbox" value="remember-me"> Mantener sesión iniciada
								</label>
							</div>
							<button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
						</form>	
					</div>
				
				</div>
				
			</div>
		</div>
		</main>
	@endsection