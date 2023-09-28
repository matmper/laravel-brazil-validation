<?php declare(strict_types=1);

namespace Tests;

use Tests\Helpers\FakeDocumentHelper;

class DocumentNumberRuleTest extends TestCase
{
    /**
     * @test
     */
    public function test_invalid_document_type_exception(): void
    {
        $this->expectException(\Matmper\Exceptions\InvalidDocumentTypeException::class);

        $rule = app(\Matmper\Rules\DocumentNumberRule::class);
        $rule->params(['wrong_document', 'value']);
    }

    /**
     * @test
     */
    public function test_invalid_validation_parameter_exception(): void
    {
        $this->expectException(\Matmper\Exceptions\InvalidValidationParameterException::class);

        $rule = app(\Matmper\Rules\DocumentNumberRule::class);
        $rule->params(['cpf', 'wrong_value']);
    }

    /**
     * @test
     * @dataProvider testDocumentNumberDataProvider
     */
    public function test_document_number(string $type, string $mask, string $document, bool $assert): void
    {
        $rule = app(\Matmper\Rules\DocumentNumberRule::class);

        $rule->params([$type, $mask]);
        $passes = $rule->passes(fake()->word(), $document);

        $this->assertEquals($passes, $assert);
    }

    /**
     * Data Provider: test_document_number
     *
     * @return array
     */
    public function testDocumentNumberDataProvider(): array
    {
        return [
            'cpf_cnpj_true_cpf' => ['cpf.cnpj', 'value', FakeDocumentHelper::cpf(), true],
            'cpf_cnpj_true_cnpj' => ['cpf.cnpj', 'value', FakeDocumentHelper::cnpj(), true],
            'cpf_cnpj_false' => ['cpf.cnpj', 'value', fake()->word(), false],

            'cpf_true' => ['cpf', 'value', FakeDocumentHelper::cpf(), true],
            'cpf_true_mask' => ['cpf', 'mask', FakeDocumentHelper::cpf(true), true],
            'cpf_false_mask' => ['cpf', 'mask', FakeDocumentHelper::cpf(), false],
            'cpf_false' => ['cpf', 'value', '00000000000', false],

            'cnpj_true' => ['cnpj', 'value', FakeDocumentHelper::cnpj(), true],
            'cnpj_true_mask' => ['cnpj', 'mask', FakeDocumentHelper::cnpj(true), true],
            'cnpj_false_mask' => ['cnpj', 'mask', FakeDocumentHelper::cnpj(), false],
            'cnpj_false' => ['cnpj', 'value', '00000000000000', false],
        ];
    }
}
