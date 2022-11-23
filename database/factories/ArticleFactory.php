<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->word(),
            'code'        => $this->faker->randomNumber(8, true),
            'description' => $this->faker->sentence(),
            'status'      => $this->faker->randomElement(['on', 'off']),
            'price'       => $this->faker->randomFloat(2, 0, 3000)
        ];
    }
}
