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

            'nome' => fake()->name(),
            'cnpj' => fake()->numerify('##############'),
            'telefone' => fake()->phoneNumber(),
            'produto_id' => Produto::inRandomOrder()->first()?->id ?? Produto::factory(),

        ];
    }
}