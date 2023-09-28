<?php

declare(strict_types=1);

namespace Matmper\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Throwable;

class InvalidDocumentTypeException extends Exception
{
    /**
     * @param string|null $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        string $message = null,
        int $code = Response::HTTP_NOT_FOUND,
        Throwable $previous = null,
    ) {
        $message = "Invalid document type for validation: {$message}";

        parent::__construct($message, $code, $previous);
    }
}
