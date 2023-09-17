<?php

namespace Matmper\Services;

class DocumentCnpjService
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  mixed  $value
     * @return bool
     */
    public function passes(mixed $value, bool $checkMask): bool
    {
        $cnpjValue = (string) preg_replace("/[^0-9]/", "", $value);

        $validate = $this->validate($cnpjValue);

        $mask = $checkMask
            ? preg_match('/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/', $value)
            : true;

        return $mask && $validate;
    }

    /**
     * Validate CNPJ document number value
     *
     * @param string $cnpj
     * @return boolean
     */
    private function validate(string $cnpj): bool
    {
        $value = 0;

        $value += (int) $cnpj[0] * 5;
        $value += (int) $cnpj[1] * 4;
        $value += (int) $cnpj[2] * 3;
        $value += (int) $cnpj[3] * 2;
        $value += (int) $cnpj[4] * 9;
        $value += (int) $cnpj[5] * 8;
        $value += (int) $cnpj[6] * 7;
        $value += (int) $cnpj[7] * 6;
        $value += (int) $cnpj[8] * 5;
        $value += (int) $cnpj[9] * 4;
        $value += (int) $cnpj[10] * 3;
        $value += (int) $cnpj[11] * 2;

        $d1 = $value % 11;
        $d1 = $d1 < 2 ? 0 : 11 - $d1;

        $value = 0;
        $value += (int) $cnpj[0] * 6;
        $value += (int) $cnpj[1] * 5;
        $value += (int) $cnpj[2] * 4;
        $value += (int) $cnpj[3] * 3;
        $value += (int) $cnpj[4] * 2;
        $value += (int) $cnpj[5] * 9;
        $value += (int) $cnpj[6] * 8;
        $value += (int) $cnpj[7] * 7;
        $value += (int) $cnpj[8] * 6;
        $value += (int) $cnpj[9] * 5;
        $value += (int) $cnpj[10] * 4;
        $value += (int) $cnpj[11] * 3;
        $value += (int) $cnpj[12] * 2;

        $d2 = $value % 11;
        $d2 = $d2 < 2 ? 0 : 11 - $d2;

        return $cnpj[12] == $d1 && $cnpj[13] == $d2;
    }
}
