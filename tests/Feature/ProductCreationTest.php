<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_autenticado_pode_criar_produto()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/api/products', [
            'name' => 'Mouse Gamer',
            'price' => 250,
        ]);

        $response->assertStatus(201);
    }

    public function test_usuario_nao_autenticado_nao_pode_criar_produto()
    {
        $response = $this->post('/api/products', [
            'name' => 'Mouse Gamer',
            'price' => 250,
        ]);

        $response->assertStatus(401);
    }
}
