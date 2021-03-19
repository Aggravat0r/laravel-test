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
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => "0".$this->faker->randomNumber(9, true),
            'city' => $this->faker->randomElement(['Киев', 'Харьков', 'Винница', 'Львов', 'Запорожье']),
        ];
    }
}
