<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'nombre' => 'Ingeniero',
        ]);

        Tag::create([
            'nombre' => 'Ventas',
        ]);

        factory(Tag::class)->times(5)->create();
    }
}
