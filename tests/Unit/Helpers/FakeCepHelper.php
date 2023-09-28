<?php

namespace Tests\Helpers;

class FakeCepHelper
{
    /**
     * Generate a fake CEP
     *
     * @param boolean $mask
     * @return string
     */
    public static function cep(bool $mask = false): string
    {
        $cep01 = random_int(10000, 99999);
        $mask = $mask ? '-' : '';
        $cep02 = random_int(100, 999);

        return $cep01 . $mask . $cep02;
    }
}
