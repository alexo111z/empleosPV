<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class)->create([
            'nombre' => 'Luis',
            'email' => 'prueba@correo.com',
            'password' => bcrypt('laravel'),
            'id_area' => 1,
            'alias' => 'prueba',
        ]);
//        'alias' => substr($mail, 0, strpos($mail, "@")),   obtener alias

        factory(User::class)->times(10)->create();
    }
}
