<?php

namespace Matmper\Rules;

use Matmper\Contracts\RuleContract;
use Matmper\Enums\DocumentType;

class DocumentNumberRule implements RuleContract
{
    /**
     * List to documents to validate
     *
     * @var array<string>
     */
    private $documents = [];

    /**
     * Set true if check mask and value
     *
     * @var bool
     */
    private $checkMask = false;

    /**
     * Force validate only numbers in document value
     *
     * @var bool
     */
    private $disableAlphanumeric = false;

    /**
     * @inheritDoc
     */
    public function params(array $params): self
    {
        $this->setDocuments($params[0] ?? 'cpf.cnpj');
        $this->setParams($params);

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
        $cpfRule = new \Matmper\Services\DocumentCpfService();

        if (in_array(DocumentType::CPF, $this->documents) && $cpfRule->passes($value, $this->checkMask)) {
            return true;
        }

        $cnpjRule = new \Matmper\Services\DocumentCnpjService();

        if (
            in_array(DocumentType::CNPJ, $this->documents)
            && $cnpjRule->passes($value, $this->checkMask, $this->disableAlphanumeric)
        ) {
            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute não é um documento válido';
    }

    /**
     * Validate document list and set in $this->documents
     *
     * @param string $documents cpf.cnpj
     * @return void
     */
    private function setDocuments(string $documents): void
    {
        $this->documents = explode('.', $documents);

        $validDocumentTypes = [DocumentType::CPF, DocumentType::CNPJ];

        foreach ($this->documents as $document) {
            if (!in_array($document, $validDocumentTypes)) {
                throw new \Matmper\Exceptions\InvalidDocumentTypeException($document);
            }
        }
    }

    /**
     * Validate and set validation parameters
     *
     * @param array<string> $params
     * @return void
     */
    private function setParams(array $params): void
    {
        $params = array_filter($params, function ($param, $key) {
            return $key > 0;
        }, ARRAY_FILTER_USE_BOTH);

        foreach ($params as $param) {
            match ($param) {
                'disable_alphanumeric' => $this->disableAlphanumericTrue(),
                'mask' => $this->setCheckMaskTrue(),
                'value' => $this->setCheckMaskFalse(),
                default => throw new \Matmper\Exceptions\InvalidValidationParameterException($param),
            };
        }
    }

    private function disableAlphanumericTrue(): void
    {
        $this->disableAlphanumeric = true;
    }

    private function setCheckMaskTrue(): void
    {
        $this->checkMask = true;
    }

    private function setCheckMaskFalse(): void
    {
        $this->checkMask = false;
    }
}
