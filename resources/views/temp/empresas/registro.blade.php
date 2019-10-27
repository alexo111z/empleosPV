@include('header')
<main role="main">

    <form action="{{ route('emp.create') }}" method="POST">
        {{ csrf_field() }}

        <label for="nombre">Nombre de la empresa</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ old('nombre') }}">

        <label for="rfc">RFC</label>
        <input type="text" class="form-control" id="rfc" name="rfc" placeholder="" value="{{ old('rfc') }}">

        <label for="d_fiscal">Direccion fiscal</label>
        <input type="text" class="form-control" id="d_fiscal" name="d_fiscal" placeholder="" value="{{ old('d_fiscal') }}">

        <label for="pais">Pais</label>
        <input type="text" class="form-control" id="pais" name="pais" placeholder="" value="{{ old('pais') }}">

        <label for="estado">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" placeholder="" value="{{ old('estado') }}">

        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="" value="{{ old('ciudad') }}">

        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="" value="{{ old('telefono') }}">

        <label for="contacto">Nombre de contacto</label>
        <input type="text" class="form-control" id="contacto" name="contacto" placeholder="" value="{{ old('contacto') }}">

        <label>Razon Social</label>
        <select class="custom-select d-block w-100" name="id_social">
            <option value="{{ old('id_social') }}">{{ old('id_social') }}</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
        </select>

        <label>Giro</label>
        <select class="custom-select d-block w-100" name="id_giro">
            <option value="{{ old('id_giro') }}">{{ old('id_giro') }}</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
        </select>

        <label for="email">Correo</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{ old('email') }}">

        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="" value="{{ old('password') }}">

        <button type="submit">Crear</button>
    </form>

</main>
@include('footer')
