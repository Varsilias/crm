<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'company_name' => $this->faker->company(),
            'company_address' => $this->faker->address(),
            'company_email' => $this->faker->companyEmail(),
            'company_location' => $this->faker->country(),
            'amount_charged' => $this->faker->numberBetween(1000, 100000)
        ];
    }
}
