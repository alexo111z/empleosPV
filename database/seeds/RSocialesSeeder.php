<?php

use App\RSocial;
use Illuminate\Database\Seeder;

class RSocialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RSocial::create([
            'nombre' => 'SA de CV',
        ]);

        RSocial::create([
            'nombre' => 'SA'
        ]);

        factory(RSocial::class)->times(5)->create();
    }
}
