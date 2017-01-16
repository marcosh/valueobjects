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
        $filteredValue = filter_var($value, FILTER_VALIDATE_MAC);

        if ($filteredValue === false) {
            throw new InvalidNativeArgumentException($value, array('string (valid Mac address)'));
        }

        $this->value = $filteredValue;
    }
}
