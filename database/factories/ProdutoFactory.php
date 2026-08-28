<?php

namespace Database\Factories;

use App\Models\Aluno;/*MUDAR */
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<produto>
 */
class produtoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'nome' => fake()->name(),
            'preco_unit' => fake()->numerify('R$ ##,##'),
            'categoria' => $this->faker->randomElement(['Doces e tortas', 'Salgados', 'Cafés']), /*seleção da categoria */
        ];
    }
}
