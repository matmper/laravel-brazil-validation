<?php

namespace Matmper\Services;

class DocumentCnpjService
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $value
     * @param bool $checkMask
     * @param bool $disableAlphanumeric
     * @return bool
     */
    public function passes(string $value, bool $checkMask, bool $disableAlphanumeric = false): bool
    {
        $cnpjValue = (string) mb_strtoupper(trim($value), 'UTF-8');

        if (ctype_digit($cnpjValue) === true || $disableAlphanumeric === true) {
            $cnpjValue = preg_replace("/[^0-9]/", "", $cnpjValue);
            $validate = $this->validate($cnpjValue);
            $regex = '/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/';
        } else {
            $cnpjValue = preg_replace("/[^0-9A-Z]/", "", $cnpjValue);
            $validate = $this->alphanumericValidate($cnpjValue);
            $regex = '/^[0-9A-Z]{2}\.[0-9A-Z]{3}\.[0-9A-Z]{3}\/[0-9A-Z]{4}-[0-9A-Z]{2}$/';
        }

        $mask = $checkMask ? preg_match($regex, $value) : true;

        return $mask && $validate;
    }

    /**
     * Validate CNPJ document number value
     *
     * @param string $cnpj
     * @return boolean
     */
    private function validate(?string $cnpj): bool
    {
        if ($cnpj === null || strlen($cnpj) !== 14) {
            return false;
        }

        if (substr_count($cnpj, substr($cnpj, 0, 1)) === strlen($cnpj)) {
            return false;
        }

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

    /**
     * Since July 2026 the CNPJ document number may contain letters
     * @param string $cnpj
     * @return boolean
     */
    private function alphanumericValidate(?string $cnpj): bool
    {
        if ($cnpj === null || strlen($cnpj) !== 14) {
            return false;
        }

        if (!preg_match("/^[0-9A-Z]{12}[0-9]{2}$/", $cnpj)) {
            return false;
        }

        for ($t = 12; $t < 14; $t++) {
            $sum = 0;
            $weight = ($t === 12) ? 5 : 6;

            for ($i = 0; $i < $t; $i++) {
                $value = ord($cnpj[$i]) - 48;
                $sum += $value * $weight;
                $weight = ($weight === 2) ? 9 : $weight - 1;
            }

            $resto = $sum % 11;
            $dg = ($resto < 2) ? 0 : 11 - $resto;

            if ($cnpj[$t] != $dg) {
                return false;
            }
        }

        return true;
    }
}
