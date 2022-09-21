<?php

namespace Database\Factories;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(2),
            'active' => random_int(0,1),
        ];
    }
}
