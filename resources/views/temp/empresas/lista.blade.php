@include('header')
<main role="main">

    <h1>{{ $title }}</h1>

    @forelse($empresas as $empresa)
        <li>{{ $empresa->nombre }}
            - <a href="{{ route('emp.edit', $empresa->id) }}">Editar</a>
                - <a href="{{ route('oferta.list', Crypt::encrypt($empresa->id)) }}">Ofertas</a> </li>
    @empty
        <li>No hay empresas registradas.</li>
    @endforelse

    <br>
    <a href="{{ route('emp.registro') }}" >Agregar</a>

</main>
@include('footer')
