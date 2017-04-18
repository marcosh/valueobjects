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

    public function invalidImeiDataProvider()
    {
        return [
            ['49015420323751'], // too short
            ['4901542032375183'], // too long
            ['490154203237517'] // wrong checksum
        ];
    }

    /**
     * @dataProvider invalidImeiDataProvider
     */
    public function testInvalidImei($imei)
    {
        $this->setExpectedException('ValueObjects\Exception\InvalidNativeArgumentException');

        new Imei($imei);
    }
}
