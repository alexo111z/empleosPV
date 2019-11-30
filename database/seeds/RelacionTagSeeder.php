<?php

use App\RelacionTag;
use Illuminate\Database\Seeder;

class RelacionTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(RelacionTag::class)->times(10)->create();

        factory(RelacionTag::class)->times(10)
            ->create([
                'id_usuario' => null,
            ]);

        factory(RelacionTag::class)->times(10)
            ->create([
                'id_oferta' => null,
            ]);

    }
}
