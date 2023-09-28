<?php declare(strict_types=1);

namespace Tests\Feature;

use Tests\Helpers\FakeDocumentHelper;
use Tests\TestCase;

class DocumentNumberRuleTest extends TestCase
{
    /**
     * @test
     */
    public function test_invalid_validation_parameter_exception(): void
    {
        $response = $this->post('test', [
            'document' => FakeDocumentHelper::cnpj(false),
            'rules' => [
                'document' => ['document'],
            ],
        ]);

        $response->assertStatus(200);
    }
}
