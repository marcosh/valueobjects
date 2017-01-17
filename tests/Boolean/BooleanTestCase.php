<?php

namespace ValueObjects\Tests\Boolean;

use ValueObjects\Tests\TestCase;

class BooleanTestCase extends TestCase
{
    public function booleanValuesProvider()
    {
        return array(
            array('1', true),
            array('true', true),
            array('on', true),
            array('yes', true),
            array('0', false),
            array('false', false),
            array('off', false),
            array('no', false),
            array('', false),
        );
    }
}
