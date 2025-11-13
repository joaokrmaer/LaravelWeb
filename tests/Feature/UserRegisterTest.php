<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_pode_ser_registrado()
    {
        $response = $this->post('/api/register', [
            'name' => 'Kramer',
            'email' => 'kramer@example.com',
            'password' => '12345678',
        ]);

        $response->assertStatus(201);
    }

    public function test_registro_falha_sem_email()
    {
        $response = $this->post('/api/register', [
            'name' => 'Kramer',
            'password' => '12345678',
        ]);

        $response->assertStatus(422);
    }
}
