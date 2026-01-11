<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Solo llama a los seeders que sí estás usando
        $this->call([
            ProductSeeder::class,
        ]);
    }
}
