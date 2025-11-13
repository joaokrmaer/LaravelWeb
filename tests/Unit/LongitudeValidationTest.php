<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class LongitudeValidationTest extends TestCase
{
    public function test_longitude_valida()
    {
        $longitude = -46.63;
        $this->assertIsNumeric($longitude);
    }

    public function test_longitude_invalida()
    {
        $longitude = 'xyz';
        $this->assertFalse(is_numeric($longitude));
    }
}
