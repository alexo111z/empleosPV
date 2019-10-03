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

        <form action="{!! url('') !!}" method="post">

           {!! csrf_field()!!}

            <label>Nombres</label>
            <input type="text" class="form-control" name="firstName" placeholder="">

            <label>Apellidos</label>
            <input type="text" class="form-control" name="lastname" placeholder=""><p></p>

            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder=""><p></p>

            <label>Contraseña</label>
            <input type="password" class="form-control" name="password" placeholder=""><p></p>

            <label>Edad</label>
            <input type="text" class="form-control" name="edad" placeholder=""><p></p>

            <label>Fecha Nacimiento</label>
            <input type="text" class="form-control" name="fecha" placeholder=""><p></p>

            <label>Genero</label>
            <select class="custom-select d-block w-100" name="genero">
                <option value="">Choose...</option>
                <option value="0">Hombre</option>
                <option value="1">Mujer</option>
            </select><p></p>

            <label>Nivel Estudios</label>
            <select class="custom-select d-block w-100" name="estudios">
                <option value="">Choose...</option>
                <option value="Primaria">Primaria</option>
                <option value="Secundaria">Secundaria</option>
            </select><p></p>

            <label>Area</label>
            <select class="custom-select d-block w-100" name="area">
                <option value="">Choose...</option>
                <option value="lic">Licenciatura</option>
                <option value="otros">Otros</option>
            </select><p></p>

            <button type="submit">Registrar</button>
        </form>

    </body>
</html>
