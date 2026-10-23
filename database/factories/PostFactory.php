<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {

        $comidas = [
    'Expresso',
    'Cappuccino',
    'Café americano',
    'Mocca',
    'Latte macchiato',
    'Chocolate quente',
    
    'Café gelado',
    'Frappuccino de caramelo',
    'Chá gelado de pêssego',
    'Soda italiana de maçã verde',

    'Pão de queijo',
    'Croissant',
    'Empada de frango',
    'Misto quente',
    'Toast de abacate',

    'Bolo de cenoura com chocolate',
    'Cookie de chocolate',
    'Torta de limão',
    'Cheesecake de frutas vermelhas',
    'Donut de doce de leite',
];

        return [
            'numero_pedido' => fake()->numberBetween(1, 1000),// número de pedidos
            'valor_t' => fake()->randomFloat(2, 10, 20 ),// decimal e até 20
            'produto' => fake()->randomElement($comidas),
        ];
    }
}