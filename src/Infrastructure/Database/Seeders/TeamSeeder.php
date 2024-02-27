<?php

namespace Src\Infrastructure\Database\Seeders;

use Illuminate\Database\Seeder;
use Src\Infrastructure\Database\EloquentModels\TeamEloquentModel;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeamEloquentModel::factory()
            ->count(5)
            ->create();
    }

}
