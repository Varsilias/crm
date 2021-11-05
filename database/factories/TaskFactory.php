<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => $this->faker->numberBetween(1, 30),
            'task' => $this->faker->sentence(8),
            'estimated_time' => $this->faker->randomDigitNotNull(),
            'status_id' => $this->faker->numberBetween(1, 3),

        ];
    }
}
