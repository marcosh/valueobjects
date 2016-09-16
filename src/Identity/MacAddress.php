<?php

namespace ValueObjects\Identity;

use ValueObjects\Exception\InvalidNativeArgumentException;
use ValueObjects\StringLiteral\StringLiteral;

class MacAddress extends StringLiteral
{
    /**
     * Returns a MacAddress
     *
     * @param string $value
     */
    public function __construct($value)
    {
        if (0 === \preg_match('/^(?:[0-9a-f]{2}([-:]))(?:[0-9a-f]{2}\1){4}[0-9a-f]{2}$/i', $value)) {
            throw new InvalidNativeArgumentException($value, array('string (valid Mac address)'));
        }

        $this->value = $value;
    }
}
