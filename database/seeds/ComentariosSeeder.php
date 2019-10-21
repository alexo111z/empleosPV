<?php

use App\Comentario;
use Illuminate\Database\Seeder;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comentario::class)->times(5)
            ->create([
            'id_usuario' => 1,
                ]);

        factory(Comentario::class)->times(10)->create();
    }
}
