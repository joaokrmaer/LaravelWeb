<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PasswordValidationTest extends TestCase
{
    public function test_senha_maior_que_6_caracteres()
    {
        $senha = '1234567';
        $this->assertGreaterThanOrEqual(6, strlen($senha));
    }

    public function test_senha_fraca()
    {
        $senha = '123';
        $this->assertLessThan(6, strlen($senha));
    }
}
