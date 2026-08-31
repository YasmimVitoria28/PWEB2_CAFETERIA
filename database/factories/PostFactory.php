<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {

        $comidas = [
            'Expresso',
            'Cappuccino',
            'Pão de queijo',
            'Croissant',
            'Bolo de cenoura com chocolate',
            'Cookie de chocolate',
            'Café americano',
            'Café gelado',
            'Mocca',
        ];

        return [
            'numero_pedido' => fake()->numberBetween(1, 1000),// número de pedidos
            'valor_t' => fake()->randomFloat(2, 10, 200 ),// decimal e até 200
            'nome' => fake()->randomElement($comidas),
        ];
    }
}