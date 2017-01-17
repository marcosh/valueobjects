<?php

namespace ValueObjects\Tests\Boolean;

use ValueObjects\Boolean\BooleanString;

class BooleanStringTest extends BooleanTestCase
{
    /** @dataProvider booleanValuesProvider */
    public function testFromNative($boolean)
    {
        $fromNativeBooleanString = BooleanString::fromNative($boolean);
        $constructedBooleanString = new BooleanString($boolean);

        $this->assertTrue($fromNativeBooleanString->sameValueAs($constructedBooleanString));
    }

    /** @expectedException \ValueObjects\Exception\InvalidNativeArgumentException */
    public function testInvalidNativeArgument()
    {
        new BooleanString('enabled');
    }

    /** @dataProvider booleanValuesProvider */
    public function testToBool($boolean, $expected)
    {
        $booleanString = new BooleanString($boolean);

        $this->assertEquals($booleanString->toBool(), $expected);
    }
}
