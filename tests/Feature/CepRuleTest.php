<?php declare(strict_types=1);

namespace Tests\Feature;

use Tests\Helpers\FakeCepHelper;
use Tests\TestCase;

class CepRuleTest extends TestCase
{
    /**
     * @test
     * @dataProvider testCepDataProvider
     */
    public function testCepRequest(string $cep, int $assertStatus): void
    {
        $response = $this->post('test', [
            'cep' => $cep,
            'rules' => [
                'cep' => 'cep',
            ],
        ]);

        $response->assertStatus($assertStatus);
    }

    /**
     * Data Provider: testCepRequest
     *
     * @return array
     */
    public function testCepDataProvider(): array
    {
        return [
            'cep_success' => [FakeCepHelper::cep(), 200],
            'cep_error' => [FakeCepHelper::cep() . fake()->randomDigit(), 400],
        ];
    }
}
