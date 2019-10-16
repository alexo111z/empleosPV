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

        <form method="POST" action="{!! url('/usuarios/crear') !!}">
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
            <input type="text" class="form-control" id="edad" name="edad" placeholder="">
                <p></p>
            <label for="fecha">Fecha Nacimiento</label>
            <input type="text" class="form-control" id="fecha" name="fecha" placeholder="">
                <p></p>
            <label>Genero</label>
            <select class="custom-select d-block w-100" name="genero">
                <option value="">Choose...</option>
                <option value="0">Hombre</option>
                <option value="1">Mujer</option>
            </select>
                <p></p>
            <label>Nivel Estudios</label>
            <select class="custom-select d-block w-100" name="estudios">
                <option value="Primaria">Primaria</option>
                <option value="Secundaria">Secundaria</option>
            </select>
                <p></p>
            <label>Area</label>
            <select class="custom-select d-block w-100" name="area">
                <option value="Comida">Comida</option>
                <option value="Otros">Otros</option>
            </select>
                <p></p>
            <button type="submit">Registrar</button>
        </form>

    </body>
</html>
