<?php

namespace Tests\Helpers;

class MaskHelper
{
    /**
     * Create a string mask
     *
     * @param string $value
     * @param string $mask
     * @return string
     */
    public static function create(string $value, string $mask): string
    {
        $mask = str_replace('#', '%s', $mask);
        return vsprintf($mask, str_split($value));
    }
}
