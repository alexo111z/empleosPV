<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->truncateTables([
            'giros',
            'tags',
            'rsociales',
            'nestudios',
            'empresas',
            'users',
            'area',
            'calificaciones',
            'comentarios',
        ]);

        $this->call(GiroSeeder::class);
        $this->call(AreasSeeder::class);
        $this->call(RSocialesSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(NEstudiosSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EmpresasSeeder::class);
        $this->call(CalificacionesSeeder::class);
        $this->call(ComentariosSeeder::class);
    }

    public function truncateTables(array $tables) {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

    }
}
