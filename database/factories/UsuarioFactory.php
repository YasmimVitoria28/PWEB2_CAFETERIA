<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Aluno>
 */
class AlunoFactory extends Factory
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
            'email' => fake()->email(),
            'telefone' => fake()->phoneNumber(),
            'login' => fake()->name(),
            'senha' => fake()->password(),
        ];
    }
}
