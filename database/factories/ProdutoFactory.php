<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;


class produtoFactory extends Factory
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
            'nome' => fake()->randomElement($comidas),
            'preco_unit' => fake()->randomFloat(2, 10, 25),
            'categoria' => $this->faker->randomElement(['Doces e tortas', 'Salgados', 'Cafés']), /*seleção da categoria */
        ];
    }
}
