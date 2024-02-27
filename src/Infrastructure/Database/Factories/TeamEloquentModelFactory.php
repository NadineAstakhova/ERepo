<?php

namespace Src\Infrastructure\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Infrastructure\Database\EloquentModels\TeamEloquentModel;

class TeamEloquentModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TeamEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word()
        ];
    }
}
