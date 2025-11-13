<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransferProcessTest extends TestCase
{
    use RefreshDatabase;

    public function test_transferencia_valida()
    {
        $user = User::factory()->create(['saldo' => 1000]);
        $destinatario = User::factory()->create(['saldo' => 500]);

        $response = $this->actingAs($user)->post('/api/transfer', [
            'to_user_id' => $destinatario->id,
            'valor' => 100,
        ]);

        $response->assertStatus(200);
    }

    public function test_transferencia_falha_por_saldo_insuficiente()
    {
        $user = User::factory()->create(['saldo' => 10]);
        $destinatario = User::factory()->create(['saldo' => 500]);

        $response = $this->actingAs($user)->post('/api/transfer', [
            'to_user_id' => $destinatario->id,
            'valor' => 100,
        ]);

        $response->assertStatus(400);
    }
}
