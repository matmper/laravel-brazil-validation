<?php

namespace Matmper\Rules;

use Matmper\Contracts\RuleContract;

class CepRule implements RuleContract
{
    /**
     * Set true if check mask and value
     *
     * @var bool
     */
    private $checkMask;

    /**
     * @inheritDoc
     */
    public function params(array $params): self
    {
        $this->setMask($params[0] ?? 'value');

        return $this;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param   string  $attribute
     * @param   string  $value
     * @return  bool
     */
    public function passes(string $attribute, mixed $value): bool
    {
        if ($this->checkMask && !preg_match('/\d{5}\-\d{3}/', $value)) {
            return false;
        }

        return strlen((string) preg_replace("/[^\d]/", "", $value)) === 8;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
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
