<?php

namespace Database\Factories;

use App\Models\Avaliacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<produto>
 */
class AvaliacaoFactory extends Factory
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
