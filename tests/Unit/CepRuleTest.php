<?php declare(strict_types=1);

namespace Tests\Unit;

use Tests\Helpers\FakeCepHelper;
use Tests\TestCase;

class CepRuleTest extends TestCase
{
    /**
     * @test
     */
    public function test_invalid_validation_parameter_exception(): void
    {
        $this->expectException(\Matmper\Exceptions\InvalidValidationParameterException::class);

        $rule = app(\Matmper\Rules\CepRule::class);
        $rule->params(['wrong_value']);
    }

    /**
     * @test
     * @dataProvider testCepDataProvider
     */
    public function test_document_number(string $type, string $cep, bool $assert): void
    {
        $rule = app(\Matmper\Rules\CepRule::class);

        $rule->params([$type]);
        $passes = $rule->passes(fake()->word(), $cep);

        $this->assertEquals($passes, $assert);
    }

    /**
     * Data Provider: test_document_number
     *
     * @return array
     */
    public function testCepDataProvider(): array
    {
        return [
            'cep_true' => ['value', FakeCepHelper::cep(), true],
            'cep_true_mask' => ['value', FakeCepHelper::cep(true), true],
            'cep_false' => ['value', FakeCepHelper::cep() . fake()->randomDigit(), false],

            'cep_mask_true' => ['mask', FakeCepHelper::cep(true), true],
            'cep_mask_false_value' => ['mask', FakeCepHelper::cep(), false],
            'cep_mask_false' => ['mask', FakeCepHelper::cep(true) . fake()->randomDigit(), false],
        ];
    }
}
