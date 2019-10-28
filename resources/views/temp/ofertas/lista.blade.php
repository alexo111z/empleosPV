@include('header')
<main role="main">

    <h1>{{ $empresa->nombre }}</h1>

    @forelse($ofertas as $oferta)
        <li>
            {{ $oferta->titulo }}
            - <a href="#">Editar</a>
        </li>
    @empty
        <li>No hay Ofertas.</li>
    @endforelse

    <br>
    <a href="{{ route('oferta.nueva', Crypt::encrypt($empresa->id)) }}" >Nueva Oferta</a>

</main>
@include('footer')
