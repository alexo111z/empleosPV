<?php

use Illuminate\Database\Seeder;
use App\Estado;
class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Estado::class)->times(5)->create();
    }
}
