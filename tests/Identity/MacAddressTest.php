<?php

namespace ValueObjects\Tests\Identity;

use ValueObjects\Identity\MacAddress;
use ValueObjects\Tests\TestCase;

class MacAddressTest extends TestCase
{
    public function testValidMacAddressWithDash()
    {
        $macAddress = new MacAddress('1A-2b-3C-4d-5E-6f');
        $this->assertInstanceOf('ValueObjects\Identity\MacAddress', $macAddress);
    }

    public function testValidMacAddressWithColon()
    {
        $macAddress = new MacAddress('1A:2b:3C:4d:5E:6f');
        $this->assertInstanceOf('ValueObjects\Identity\MacAddress', $macAddress);
    }

    public function testValidMacAddressWithDot()
    {
        $macAddress = new MacAddress('1A2b.3C4d.5E6f');
        $this->assertInstanceOf('ValueObjects\Identity\MacAddress', $macAddress);
    }

    /** @expectedException ValueObjects\Exception\InvalidNativeArgumentException */
    public function testInvalidMacAddressWithBothDashAndColon()
    {
        new MacAddress('1a:2B-3c:4D-5e');
    }

    /** @expectedException ValueObjects\Exception\InvalidNativeArgumentException */
    public function testInvalidMacAddressWithWrongLength()
    {
        new MacAddress('1a-2B-3c-4D');
    }
}
