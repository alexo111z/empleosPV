<?php

use App\NEstudio;
use Illuminate\Database\Seeder;

class NEstudiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(NEstudio::class)->times(5)->create();

    }
}
