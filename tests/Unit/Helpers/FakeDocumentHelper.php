<?php

namespace Tests\Helpers;

class FakeDocumentHelper
{
    /**
     * Generate a fake CPF document number
     *
     * @param boolean $mask
     * @return string
     */
    public static function cpf(bool $mask = false): string
    {
        $c1 = random_int(0, 9);
        $c2 = random_int(0, 9);
        $c3 = random_int(0, 9);
        $c4 = random_int(0, 9);
        $c5 = random_int(0, 9);
        $c6 = random_int(0, 9);
        $c7 = random_int(0, 9);
        $c8 = random_int(0, 9);
        $c9 = random_int(0, 9);

        $d1 = $c9 * 2 + $c8 * 3 + $c7 * 4 + $c6 * 5 + $c5 * 6 + $c4 * 7 + $c3 * 8 + $c2 * 9 + $c1 * 10;
        $d1 = 11 - round($d1 - (floor($d1 / 11) * 11));
        $d1 = $d1 >= 10 ? 0 : $d1;

        $d2 = $d1 * 2 + $c9 * 3 + $c8 * 4 + $c7 * 5 + $c6 * 6 + $c5 * 7 + $c4 * 8 + $c3 * 9 + $c2 * 10 + $c1 * 11;
        $d2 = 11 - round($d2 - (floor($d2 / 11) * 11));
        $d2 = $d2 >= 10 ? 0 : $d2;

        $number = $c1 . $c2 . $c3 . $c4 . $c5 . $c6 . $c7 . $c8 . $c9 . $d1 . $d2;

        if ($mask) {
            return MaskHelper::create($number, '###.###.###-##');
        }

        return $number;
    }

    /**
     * Generate a fake CNPJ document number
     *
     * @param boolean $mask
     * @return string
     */
    public static function cnpj(bool $mask = false): string
    {
        $c1 = random_int(0, 9);
        $c2 = random_int(0, 9);
        $c3 = random_int(0, 9);
        $c4 = random_int(0, 9);
        $c5 = random_int(0, 9);
        $c6 = random_int(0, 9);
        $c7 = random_int(0, 9);
        $c8 = random_int(0, 9);
        $c9 = 0;
        $c10 = 0;
        $c11 =
        $c12 = 1;

        $d1 = $c12 * 2 + $c11 * 3 + $c10 * 4 + $c9 * 5 + $c8 * 6 + $c7 * 7 + $c6 * 8 + $c5 * 9 + $c4 * 2 + $c3 * 3
            + $c2 * 4 + $c1 * 5;
        $d1 = 11 - (round($d1 - (floor($d1 / 11) * 11)));
        $d1 = $d1 >= 10 ? 0 : $d1;

        $d2 = $d1 * 2 + $c12 * 3 + $c11 * 4 + $c10 * 5 + $c9 * 6 + $c8 * 7 + $c7 * 8 + $c6 * 9 + $c5 * 2 + $c4 * 3
            + $c3 * 4 + $c2 * 5 + $c1 * 6;
        $d2 = 11 - (round($d2 - (floor($d2 / 11) * 11)));
        $d2 = $d2 >= 10 ? 0 : $d2;

        $number = $c1 . $c2 . $c3 . $c4 . $c5 . $c6 . $c7 . $c8 . $c9 . $c10 . $c11 . $c12 . $d1 . $d2;

        if ($mask === true) {
            return MaskHelper::create($number, '##.###.###/####-##');
        }

        return $number;
    }
}
