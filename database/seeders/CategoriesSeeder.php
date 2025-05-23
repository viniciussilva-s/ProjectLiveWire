<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Suporte Técnico', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Financeiro', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Comercial', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'RH', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
