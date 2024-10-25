<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SecretariaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome_secretaria' => $this->faker->name(),
            'login' => $this->faker->unique()->userName(),
            'senha' => bcrypt('password'), // Use bcrypt to hash passwords
        ];
    }
}
