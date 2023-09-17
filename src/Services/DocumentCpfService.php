<?php

namespace Matmper\Services;

class DocumentCpfService
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  mixed  $value
     * @return bool
     */
    public function passes(mixed $value, bool $checkMask): bool
    {
        $cpfValue = (string) preg_replace("/[^0-9]/", "", $value);

        $validate = $this->validate($cpfValue);

        $mask = $checkMask
            ? preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$/', $value)
            : true;

        return $mask && $validate;
    }

    /**
     * Validate CPF document number value
     *
     * @param string $cpf
     * @return boolean
     */
    private function validate(string $cpf): bool
    {
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($i = 9; $i < 11; $i++) {
            for ($value = 0, $c = 0; $c < $i; $c++) {
                $value += (int) $cpf[$c] * (($i + 1) - $c);
            }

            $value = ((10 * $value) % 11) % 10;

            if ($cpf[$c] != $value) {
                return false;
            }
        }

        return true;
    }
}
