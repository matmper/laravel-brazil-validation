<?php

namespace Matmper\Rules;

use Matmper\Contracts\RuleContract;

class NotHtmlRule implements RuleContract
{
    /**
     * @inheritDoc
     */
    public function params(array $params): self
    {
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
        if (!is_string($value)) {
            throw new \Matmper\Exceptions\ValueIsNotStringException($attribute);
        }

        if (preg_match('/<\s?[^\>]*\/?\s?>/i', $value)) {
            return false;
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute não deve conter código HTML';
    }
}
