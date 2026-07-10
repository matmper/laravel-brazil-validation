<?php

declare(strict_types=1);

namespace Matmper\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Throwable;

class InvalidDocumentTypeException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        string $message = '',
        int $code = Response::HTTP_NOT_FOUND,
        ?Throwable $previous = null
    ) {
        $msg = "Invalid document type for validation: {$message}";
        parent::__construct($msg, $code, $previous);
    }
}
