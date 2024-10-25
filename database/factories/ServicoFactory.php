<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome_servico' => $this->faker->word(),
            'descricao' => $this->faker->sentence(6, true),
            'preco' => $this->faker->randomFloat(2, 10, 200),
        ];
    }
}
