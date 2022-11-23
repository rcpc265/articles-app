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
            'name'        => $this->faker->unique()->text(10),
            'code'        => $this->faker->unique()->regexify('[A-Z]{4}[0-4]{4}'),
            'description' => $this->faker->realText($maxNbChars = 150),
            'status'      => $this->faker->randomElement(['on', 'off']),
            'price'       => $this->faker->randomFloat(2, 0, 9999)
        ];
    }
}
