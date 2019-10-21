<?php

use App\Area;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Area::class)->create([
            'area' => 'Area 1',
        ]);
        factory(Area::class)->create([
            'area' => 'Area 2',
        ]);
        factory(Area::class)->times(10)->create();
    }
}
