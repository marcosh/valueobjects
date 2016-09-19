<?php

namespace ValueObjects\Tests\Identity;

use ValueObjects\Identity\Imei;
use ValueObjects\Tests\TestCase;

class ImeiTest extends TestCase
{
    public function testValidImei()
    {
        $imei = new Imei('490154203237518');
        $this->assertInstanceOf('ValueObjects\Identity\Imei', $imei);
    }

    /** @expectedException ValueObjects\Exception\InvalidNativeArgumentException */
    public function testInvalidImeiTooShort()
    {
        new Imei('49015420323751');
    }

    /** @expectedException ValueObjects\Exception\InvalidNativeArgumentException */
    public function testInvalidImeiTooLong()
    {
        new Imei('4901542032375183');
    }

    /** @expectedException ValueObjects\Exception\InvalidNativeArgumentException */
    public function testInvalidImeiWrongChecksum()
    {
        new Imei('490154203237517');
    }
}
