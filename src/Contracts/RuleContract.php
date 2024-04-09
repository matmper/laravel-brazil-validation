<?php

/**
 * Used for overwrite \Illuminate\Contracts\Validation\Rule;
 */
namespace Matmper\Contracts;

interface RuleContract
{
    /**
     * Set rule params
     *
     * @param array<string> $params
     * @return self
     */
    public function params(array $params): self;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed   $value
     * @return bool
     */
    public function passes(string $attribute, mixed $value): bool;

    /**
     * Get the validation error message.
     *
     * @return string|array<string>
     */
    public function message(): string|array;
}
