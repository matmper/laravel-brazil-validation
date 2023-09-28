<?php declare(strict_types=1);

namespace Tests\Feature;

use Tests\Helpers\FakeCepHelper;
use Tests\TestCase;

class CepRuleTest extends TestCase
{
    /**
     * @test
     */
    public function test_cep_request(): void
    {
        $response = $this->post('test', [
            'document' => FakeCepHelper::cep(false),
            'rules' => [
                'cep' => ['cep'],
            ],
        ]);

        $response->assertStatus(200);
    }
}
