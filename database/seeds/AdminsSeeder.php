<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Admin::class)->create([
            'email' => 'admin@correo.com',
            'password' => bcrypt('admin'),
            'nombre' => 'Administrador',
            'apellido' => 'Firsto',
        ]);
    }
}
