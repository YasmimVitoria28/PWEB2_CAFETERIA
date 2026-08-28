<?php

namespace Database\Factories;

use App\Models\Avaliacao;/*MUDAR */
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
            
            'nota' => $this->faker->randomElement(['⭐⭐⭐⭐⭐', '⭐⭐⭐⭐', '⭐⭐⭐', '⭐⭐', '⭐']), 
            'comentario' => $this->faker->paragraph(),
            
        ];
    }
}
