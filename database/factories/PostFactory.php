<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<pedido>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * 
     *      $table->integer('numero_cafe',150);
            $table->string('nome',150);
            $table->decimal('valor_t',16);
     * 
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'numero_pedido' => fake()->numerify(),
            'valor_t' => fake()->numerify('R$ ##,##'),
            'nome' => fake()->name(),
                ];
    }
}
