<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Avaliacao;

class AvaliacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Avaliacao::factory()->count(5)->create();
    }
}
