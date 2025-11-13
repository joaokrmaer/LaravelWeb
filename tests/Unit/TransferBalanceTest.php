<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class TransferBalanceTest extends TestCase
{
    public function test_transferencia_com_valores_equivalentes()
    {
        $valorA = 500;
        $valorB = 500;

        $this->assertEquals($valorA, $valorB);
    }

    public function test_transferencia_invalida_valores_diferentes()
    {
        $valorA = 300;
        $valorB = 400;

        $this->assertNotEquals($valorA, $valorB);
    }
}
