<?php

use App\Oferta;
use Illuminate\Database\Seeder;

class OfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Oferta::class)->create([
            'id_emp' => 1,
            'titulo' => 'Oferta 1',
            'd_corta' => 'Esta es la desccripcion corta',
            'd_larga' => 'Esta descripcio es mas larga .................................................',
        ]);

        factory(Oferta::class)->times(10)->create();
    }
}
