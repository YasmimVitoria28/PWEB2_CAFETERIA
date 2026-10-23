<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Fornecedor>
 */
class FornecedorFactory extends Factory
{
    public function definition(): array
    {
        return [

            'razao_social' => fake()->company(),
            'cnpj' => fake()->cnpj(),
            'vendedor' => fake()->name(),
            'telefone' => fake()->phoneNumber(),
            'produto_id' => Produto::inRandomOrder()->first()?->id ?? Produto::factory(),//busca e cria caso nao tenha

        ];
    }
}