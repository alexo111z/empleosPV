<?php

use App\Calificacion;
use Illuminate\Database\Seeder;

class CalificacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Calificacion::class)->times(10)
            ->create([
            'id_usuario' => 1,
            'califi' => 5,
                ]);

        factory(Calificacion::class)->times(10)->create();
    }
}
