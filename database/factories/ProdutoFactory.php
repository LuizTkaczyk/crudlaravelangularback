<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'quantidade' => 99,
            'valorCompra' => 99,
            'valorLucro' => 99,
            'valorVenda' => 99,
            'valorTotalCompra' => 99,
            'valorTotalVenda' => 99,
            'codProduto' => rand(111111, 999999)
        ];
    }
}
