<?php

declare(strict_types=1);

namespace Matmper\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Throwable;

class InvalidValidationParameterException extends Exception
{
    /**
     * @param string|null $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        string $message = null,
        int $code = Response::HTTP_NOT_ACCEPTABLE,
        Throwable $previous = null,
    ) {
        $message = "Validation parameter is invalid: {$message}";

        parent::__construct($message, $code, $previous);
    }
}
