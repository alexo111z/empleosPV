@include('header')
<main role="main">

    <form method="POST" action="{{ route('oferta.create', ['id' => $empresa->id]) }}">
        {{ csrf_field() }}

        <label>Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">

        <label>Descripcion corta</label>
        <textarea class="form-control" name="dcorta" id="dcorta" rows="3">{{ old('dcorta') }}</textarea>

        <label>Descripcion larga</label>
        <textarea class="form-control" name="dlarga" id="dlarga" rows="6">{{ old('dlarga') }}</textarea>

        <label>Salario</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="salario" name="salario" value="{{ old('salario') }}">
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>

        <label>Tiempo contrato</label>
        <input type="text" class="form-control" id="tcontrato" name="tcontrato" value="{{ old('tcontrato') }}">

        <label>Vigencia Oferta</label>
        <input type="text" class="form-control" id="vigencia" name="vigencia" value="{{ old('vigencia') }}">

        <label for="pais">Pais</label>
        <input type="text" class="form-control" id="pais" name="pais" placeholder="" value="{{ old('pais') }}">

        <label for="estado">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" placeholder="" value="{{ old('estado') }}">

        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="" value="{{ old('ciudad') }}">

        <button type="submit">Crear</button>
    </form>

</main>
@include('footer')
