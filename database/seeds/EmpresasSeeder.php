<?php

use App\Empresa;
use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Empresa::class)->create([
            'nombre' => 'Luis Inc.',
            'password' =>  bcrypt('empresa'),
            'email' => 'luisfakecompany@mail.com',
            'contacto' => 'Luis Alejandro', //nombre de contacto
        ]);
        factory(Empresa::class)->create([
            'nombre' => 'Tacos elodia 2',
            'password' =>  bcrypt('123456'),
            'email' => 'lupis_patius@hotmail.com',
            'contacto' => 'Elodia Wolff', //nombre de contacto
        ]);


        factory(Empresa::class)->times(10)->create();
    }
}
