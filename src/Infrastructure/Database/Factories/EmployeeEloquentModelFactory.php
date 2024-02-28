<?php

namespace Src\Infrastructure\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Infrastructure\Database\EloquentModels\EmployeeEloquentModel;
use Src\Infrastructure\Database\EloquentModels\TeamEloquentModel;

class EmployeeEloquentModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $teams = TeamEloquentModel::all();

        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'team_id' => $this->faker->numberBetween($teams->first()->id, $teams->last()->id)
        ];
    }
}
