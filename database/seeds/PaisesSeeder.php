<?php

Use App\Pais;
use Illuminate\Database\Seeder;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        factory(Pais::class)->times(5)->create();
    }
}
