<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cupom;

class CupomSeeder extends Seeder
{
    public function run(): void
    {
        Cupom::factory()->count(5)->create();
    }
}