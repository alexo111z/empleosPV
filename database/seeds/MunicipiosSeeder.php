<?php

use Illuminate\Database\Seeder;
use App\Municipio;
class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Municipio::class)->times(5)->create();
    }
}
