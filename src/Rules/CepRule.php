<?php

namespace Matmper\Rules;

use Illuminate\Contracts\Validation\Rule;

class CepRule implements Rule
{
    /**
     * Set true if check mask and value
     *
     * @var bool
     */
    private $checkMask;

    /**
     * Set rule params
     *
     * @return self
     */
    public function params(array $params): self
    {
        $this->setMask($params[0] ?? 'value');

        return $this;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if ($this->checkMask && !preg_match('/\d{5}\-\d{3}/', $value)) {
            return false;
        }

        return strlen(preg_replace("/[^\d]/", "", $value)) === 8;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute não é um CEP válido';
    }

    /**
     * Validate type and set $this->setMask
     *
     * @param string $type
     * @return void
     */
    private function setMask(string $type): void
    {
        if (!in_array($type, ['value', 'mask'])) {
            throw new \Matmper\Exceptions\InvalidValidationParameterException($type);
        }

        $this->checkMask = $type === 'mask';
    }
}
