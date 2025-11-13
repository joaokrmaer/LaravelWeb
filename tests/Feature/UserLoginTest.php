<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_valido()
    {
        $user = User::factory()->create([
            'email' => 'kramer@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $response = $this->post('/api/login', [
            'email' => 'kramer@example.com',
            'password' => '12345678',
        ]);

        $response->assertStatus(200);
    }

    public function test_login_invalido()
    {
        $response = $this->post('/api/login', [
            'email' => 'naoexiste@example.com',
            'password' => 'senhaerrada',
        ]);

        $response->assertStatus(401);
    }
}
