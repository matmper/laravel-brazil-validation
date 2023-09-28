<?php

declare(strict_types=1);

namespace Matmper\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Throwable;

class ValueIsNotStringException extends Exception
{
    /**
     * @param string|null $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        string $message = null,
        int $code = Response::HTTP_BAD_REQUEST,
        Throwable $previous = null,
    ) {
        $message = "Parameter value is not a valid string: {$message}";

        parent::__construct($message, $code, $previous);
    }
}
