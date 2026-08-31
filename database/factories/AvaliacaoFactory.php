<?php

namespace Database\Factories;

use App\Models\Avaliacao;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;


class AvaliacaoFactory extends Factory
{

    public function definition(): array
    {
         return [
            'produto_id' => Post::factory(),
            'nota' => $this->faker->randomElement(['⭐⭐⭐⭐⭐', '⭐⭐⭐⭐', '⭐⭐⭐', '⭐⭐', '⭐']), 
            'comentario' => $this->faker->paragraph(),
            
        ];
    }
}
