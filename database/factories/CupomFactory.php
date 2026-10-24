<?php

namespace Database\Factories;

use App\Models\Cupom;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cupom>
 */
class CupomFactory extends Factory
{
    public function definition(): array
{
    return [
        'produto_id' => Produto::factory(),
        'codigo' => strtoupper(fake()->unique()->bothify('CUPOM-###??')),
        'desconto_percentual' => fake()->numberBetween(5, 20),
    ];
}
}