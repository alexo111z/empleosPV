@include('header')
<main role="main">


@if ($errors->any())
        <div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
{{--        <li>{{ $error }}</li>--}}
               <p class="alert-link">{{$error}}</p>
    @endforeach
            </div>
@endif

<form method="POST" action="{{ url('/usuarios/crear') }}">
    {!! csrf_field() !!}

    <label for="firstName">Nombres</label>
    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="{{ old('firstName') }}">
    @if ($errors->has('name'))
        <p>{{ $errors->first('name') }}</p>
    @endif

    <label for="lastName">Apellidos</label>
    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="{{ old('lastName') }}">

    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{ old('email') }}">

    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="">

    <label for="edad">Edad</label>
    <input type="text" class="form-control" id="edad" name="edad" placeholder="" value="{{ old('edad') }}">

    <label for="fecha">Fecha Nacimiento</label>
    <input type="text" class="form-control" id="fecha" name="fecha" placeholder="" value="{{ old('fecha') }}">

    <label>Genero</label>
    <select class="custom-select d-block w-100" name="genero">
        <option value="{{ old('genero') }}"> @if(old('genero')) Femenino @else Masculino @endif </option>
        <option value="1">Femenino</option>
        <option value="0">Masculino</option>
    </select>

    <label>Nivel Estudios</label>
    <select class="custom-select d-block w-100" name="estudios">
        <option value="{{ old('estudios') }}">{{ old('estudios') }}</option>
        <option value="1">Primaria</option>
        <option value="2">Secundaria</option>
    </select>

    <label>Area</label>
    <select class="custom-select d-block w-100" name="area">
        <option value="{{ old('area') }}">{{ old('area') }}</option>
        <option value="1">Comida</option>
        <option value="2">Otros</option>
    </select>

    <button type="submit">Registrar</button>
</form>

</main>
@include('footer')
