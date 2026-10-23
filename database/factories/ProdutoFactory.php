<?php

namespace Database\Factories;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

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
            'nome' => fake()->randomElement($comidas),
            'preco_unit' => fake()->randomFloat(2, 10, 25),
            'categoria_id' => Categoria::inRandomOrder()->first()->id,
        ];
    }
}