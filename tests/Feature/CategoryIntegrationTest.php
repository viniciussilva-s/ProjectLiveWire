<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function pode_criar_categoria_via_post_request()
    {
        $response = $this->postJson('/api/categories', [
            'name' => 'Financeiro',
        ]);

        $response->assertStatus(201); // ✅ correto
        $response->assertJson([
            'message' => 'Categoria criada com sucesso.',
            'data' => [
                'name' => 'Financeiro',
            ]
        ]);
    }
}
