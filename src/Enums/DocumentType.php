<?php

declare(strict_types=1);

namespace Matmper\Enums;

/**
 * @phpstan-type TDocumentType = "cpf"|"cnpj"
 */
enum DocumentType
{
    public const CPF = 'cpf';
    public const CNPJ = 'cnpj';
}
