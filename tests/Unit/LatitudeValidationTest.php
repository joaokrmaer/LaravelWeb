<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class LatitudeValidationTest extends TestCase
{
    public function test_latitude_deve_ser_numerica()
    {
        $latitude = -23.55;
        $this->assertIsNumeric($latitude);
    }

    public function test_latitude_invalida()
    {
        $latitude = 'abc';
        $this->assertFalse(is_numeric($latitude));
    }
}
