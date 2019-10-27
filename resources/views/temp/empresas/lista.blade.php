@include('header')
<main role="main">

    <h1>{{ $title }}</h1>

    @forelse($empresas as $empresa)
        <li>{{ $empresa->nombre }} - <a href="{{ route('emp.edit', $empresa->id) }}">Editar</a></li>
    @empty
        <li>No hay carreras registradas.</li>
    @endforelse

    <br>
    <a href="{{ route('emp.registro') }}" >Agregar</a>

</main>
@include('footer')
