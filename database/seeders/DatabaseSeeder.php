<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            CategoriaSeeder::class,
            UsuarioSeeder::class,
            PostSeeder::class,
            ProdutoSeeder::class,
            CupomSeeder::class,
            FornecedorSeeder::class,
        ]);
    }
}