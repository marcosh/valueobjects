<?php

namespace ValueObjects\Identity;

use ValueObjects\Exception\InvalidNativeArgumentException;
use ValueObjects\StringLiteral\StringLiteral;
use ValueObjects\Util\Util;
use ValueObjects\ValueObjectInterface;

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

    private function lowercaseHex()
    {
        return strtolower(str_replace(['-', ':', '.'], '', $this->toNative()));
    }

    public function sameValueAs(ValueObjectInterface $macAddress)
    {
        if (false === Util::classEquals($this, $macAddress)) {
            return false;
        }

        return $this->lowercaseHex() === $macAddress->lowercaseHex();
    }
}
