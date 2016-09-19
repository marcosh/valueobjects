<?php

namespace ValueObjects\Identity;

use ValueObjects\Exception\InvalidNativeArgumentException;
use ValueObjects\Number\Natural;

class Imei extends Natural
{
    /**
     * Returns an Imei number
     *
     * @param int $value
     */
    public function __construct($value)
    {
        $options = array(
            'options' => array(
                'min_range' => 100000000000000,
                'max_range' => 999999999999999
            )
        );

        $value = filter_var($value, FILTER_VALIDATE_INT, $options);

        if (false === $value) {
            throw new InvalidNativeArgumentException($value, array('int (15 digits)'));
        }

        $value = $this->validateLuhnAlgorithm($value);

        $this->value = $value;
    }

    /**
     * Checks the validity of the Imei using the Luhn algorithm
     *
     * @param int $value
     * @return int
     * @throws \ValueObjects\Exception\InvalidNativeArgumentException
     */
    private function validateLuhnAlgorithm($imei)
    {
        $str = '';

        foreach (str_split(strrev((string) $imei)) as $i => $d) {
            $str .= $i %2 !== 0 ? $d * 2 : $d;
        }

        if (array_sum(str_split($str)) % 10 !== 0) {
            throw new InvalidNativeArgumentException($imei, array('int (valid Imei code)'));
        }

        return $imei;
    }
}
