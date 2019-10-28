@include('header')
<main role="main">

    <form method="POST" action="{{ route('users.create') }}">
        {!! csrf_field() !!}


    </form>

</main>
@include('footer')


'id_emp' => $faker->numberBetween(1, 10),
'titulo' => $faker->sentence(4),
'd_corta' => $faker->sentence(10),
'd_larga' => $faker->sentence(20, false),
'salario'=> $faker->numberBetween(1, 99999),
't_contrato' => null,
'vigencia' => $faker->date(),
'pais' => $faker->country,
'estado' => 'Estado X',
'ciudad' => 'Cidudad Y',
