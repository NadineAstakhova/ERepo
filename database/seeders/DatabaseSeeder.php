<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Src\Infrastructure\Database\EloquentModels\EmployeeEloquentModel;
use Src\Infrastructure\Database\Seeders\TeamSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([TeamSeeder::class]);
        EmployeeEloquentModel::factory(10)->create();
    }
}
