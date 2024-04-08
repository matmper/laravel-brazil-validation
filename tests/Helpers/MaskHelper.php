<?php

namespace Tests\Helpers;

class MaskHelper
{
    /**
     * Create a string mask
     *
     * @param string $value     123
     * @param string $mask      #.##
     * @return string           1.23
     */
    public static function create(string $value, string $mask): string
    {
        $char = str_replace(' ', '', $value);
        $strlen = strlen($char);

        for ($i = 0; $i < $strlen; $i++) {
            $mask[strpos($mask, '#')] = $char[$i];
        }

        return $mask;
    }
}
