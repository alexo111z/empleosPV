<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registro</title>
    </head>
    <body>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <br><br><br>
        @endif

        <form method="POST" action="{!! url('/usuario/crear') !!}">
            {!! csrf_field() !!}

            <label for="firstName">Nombres</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="{{ old('firstName') }}">
                @if ($errors->has('name'))
                    <p>{{ $errors->first('name') }}</p>
                @endif
                <p></p>
            <label for="lastName">Apellidos</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="{{ old('lastName') }}">
                <p></p>
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{ old('email') }}">
                <p></p>
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="">
                <p></p>
            <label for="edad">Edad</label>
            <input type="text" class="form-control" id="edad" name="edad" placeholder="" value="{{ old('edad') }}">
                <p></p>
            <label for="fecha">Fecha Nacimiento</label>
            <input type="text" class="form-control" id="fecha" name="fecha" placeholder="" value="{{ old('fecha') }}">
                <p></p>
            <label>Genero</label>
            <select class="custom-select d-block w-100" name="genero">
                <option value="{{ old('genero') }}"> @if(old('genero')) Femenino @else Masculino @endif </option>
                <option value="1">Femenino</option>
                <option value="0">Masculino</option>
            </select>
                <p></p>
            <label>Nivel Estudios</label>
            <select class="custom-select d-block w-100" name="estudios">
                <option value="{{ old('estudios') }}">{{ old('estudios') }}</option>
                <option value="1">Primaria</option>
                <option value="2">Secundaria</option>
            </select>
                <p></p>
            <label>Area</label>
            <select class="custom-select d-block w-100" name="area">
                <option value="{{ old('area') }}">{{ old('area') }}</option>
                <option value="1">Comida</option>
                <option value="2">Otros</option>
            </select>
                <p></p>
            <button type="submit">Registrar</button>
        </form>

    </body>
</html>
