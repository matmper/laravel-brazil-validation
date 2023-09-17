<?php

namespace Matmper\Rules;

use Illuminate\Contracts\Validation\Rule;
use Matmper\Enums\DocumentType;

class DocumentNumberRule implements Rule
{
    /**
     * Set true if check mask and value
     *
     * @var bool
     */
    private $checkMask;

    /**
     * List to documents to validate
     *
     * @var array
     */
    private $documents;

    /**
     * Set rule params
     *
     * @return self
     */
    public function params(array $params): self
    {
        $this->setDocuments($params[0] ?? 'cpf|cnpj');
        $this->setMask($params[1] ?? 'value');

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
        $cpfRule = new \Matmper\Services\DocumentCpfService;

        if (in_array(DocumentType::CPF, $this->documents) && $cpfRule->passes($value, $this->checkMask)) {
            return true;
        }

        $cnpjRule = new \Matmper\Services\DocumentCnpjService;

        if (in_array(DocumentType::CNPJ, $this->documents) && $cnpjRule->passes($value, $this->checkMask)) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute não é um documento válido';
    }

    /**
     * Validate document list and set in $this->documents
     *
     * @param string $documents cpf|cnpj
     * @return void
     */
    private function setDocuments(string $documents): void
    {
        $this->documents = explode('|', $documents);

        $validDocumentTypes = [DocumentType::CPF, DocumentType::CNPJ];

        foreach ($this->documents as $document) {
            if (!in_array($document, $validDocumentTypes)) {
                throw new \Matmper\Exceptions\InvalidDocumentTypeException($document);
            }
        }
    }

    /**
     * Validate type and set $this->setMask
     *
     * @param string $type
     * @return void
     */
    private function setMask(string $type): void
    {
        if (!in_array($type, ['value', 'mask'])) {
            throw new \Matmper\Exceptions\InvalidValidationParameterException($type);
        }

        $this->checkMask = $type === 'mask';
    }
}
