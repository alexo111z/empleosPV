<?php

use App\Giro;
use Illuminate\Database\Seeder;

class GiroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Giro::create([
            'giro' => 'Compra-venta',
        ]);

        Giro::create([
            'giro' => 'Comercio electronico'
        ]);

        Giro::create([
            'giro' => 'Proveedor de servicios',
        ]);

        factory(Giro::class)->times(5)->create();

    }
}
