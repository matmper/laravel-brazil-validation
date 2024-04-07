<?php declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class NotHtmlRuleTest extends TestCase
{
    /**
     * @test
     */
    public function testNotHtmlRequest(): void
    {
        $response = $this->post('test', [
            'document' => fake()->text(),
            'rules' => [
                'content' => ['not_html'],
            ],
        ]);

        $response->assertStatus(200);
    }
}
