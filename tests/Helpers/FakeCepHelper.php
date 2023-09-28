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
        $cep = random_int(10000000, 99999999);
        return $mask ? MaskHelper::create($cep, '#####-###') : $cep;
    }
}
