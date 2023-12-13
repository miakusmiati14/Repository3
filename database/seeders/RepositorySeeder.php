<?php

namespace Database\Seeders;

use App\Models\Repository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RepositorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create("id_ID");

        for ($i = 0; $i < 10; $i++) {
        Repository::create([
            'title' =>  $faker->sentence(5),
            'author' => $faker->name(),
            'year' => $faker->numberBetween(2000, 2023),
            'description' => $faker->paragraph(),
        ]);
        
        }
    }
}
