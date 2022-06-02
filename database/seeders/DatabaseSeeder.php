<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // borra la carpeta para que se borren las imágenes antiguas
        Storage::disk('public')->deleteDirectory('images');

        $this->call(UserSeeder::class);
        \App\Models\Category::factory(50)->create();

    }
}
