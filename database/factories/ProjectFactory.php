<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'client_id' => $this->faker->numberBetween(1, 20),
            'project_name' => $this->faker->sentence(5),
            'project_type' => $this->faker->randomElement(['web', 'mobile', 'desktop']),
            'project_description' => $this->faker->text(150),
            'amount_charged' => $this->faker->numberBetween(1000, 100000),
            'due_date' => $this->faker->date('Y-m-d'),
        ];
    }
}
