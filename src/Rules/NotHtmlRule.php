<?php

namespace Matmper\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotHtmlRule implements Rule
{
    /**
     * Set rule params
     *
     * @return self
     */
    public function params(array $params): self
    {
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
        if (!is_string($value)) {
            throw new \Matmper\Exceptions\ValueIsNotStringException($attribute);
        }

        if (preg_match('/<\s?[^\>]*\/?\s?>/i', $value)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute não deve conter código HTML';
    }
}
