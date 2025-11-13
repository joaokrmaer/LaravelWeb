<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ProductValueTest extends TestCase
{
    public function test_valor_produto_positivo()
    {
        $valor = 1000;
        $this->assertGreaterThan(0, $valor);
    }

    public function test_valor_produto_negativo()
    {
        $valor = -50;
        $this->assertLessThanOrEqual(0, $valor);
    }
}
