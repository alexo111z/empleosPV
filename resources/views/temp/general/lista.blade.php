@include('header')
<main role="main">

    <h1>Ofertas</h1>

    @forelse($ofertas as $oferta)
        <li>
            {{ $oferta->titulo }}
            - <a href="#">Cosa</a>
        </li>
    @empty
        <li>No hay Ofertas.</li>
    @endforelse

</main>
@include('footer')
