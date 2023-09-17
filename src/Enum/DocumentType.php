<?php

declare(strict_types=1);

namespace Matmper\Enums;

/**
 * @phpstan-type TDocumentType = cpf | cnpj
 */
enum DocumentType
{
    const CPF = 'cpf';
    const CNPJ = 'cnpj';
}
