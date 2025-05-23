<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Categories;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function pode_criar_uma_categoria_valida()
    {
        $categoria = Categories::create([
            'name' => 'Suporte Técnico',
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'Suporte Técnico',
        ]);
    }
}
