<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class EmailValidationTest extends TestCase
{
    public function test_email_valido()
    {
        $email = 'kramer@email.com';
        $this->assertMatchesRegularExpression('/^.+@.+\..+$/', $email);
    }

    public function test_email_invalido()
    {
        $email = 'kramer@';
        $this->assertDoesNotMatchRegularExpression('/^.+@.+\..+$/', $email);
    }
}
