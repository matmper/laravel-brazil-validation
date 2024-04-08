<?php declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

class NotHtmlRuleTest extends TestCase
{
    /**
     * @test
     * @dataProvider testNotHtmlDataProvider
     */
    public function test_not_html(mixed $value, bool $assert): void
    {
        $rule = app(\Matmper\Rules\NotHtmlRule::class);
        $passes = $rule->passes(fake()->word(), $value);

        $this->assertEquals($passes, $assert);
    }

    /**
     * Data Provider: test_not_html
     *
     * @return array
     */
    public function testNotHtmlDataProvider(): array
    {
        return [
            'true_string' => [$value = fake()->text(100), true],
            'false_string_01' => ["<div>{$value}</div>", false],
            'false_string_02' => ["<div>", false],
            'false_string_03' => ["</div>", false],
            'false_string_04' => ["<div><p></p></div>", false],
            'false_string_05' => ["$value<div></div>", false],
            'false_string_05' => ["<div></div>$value", false],
        ];
    }

    /**
     * @test
     * @dataProvider testNotHtmlExceptionDataProvider
     */
    public function test_not_html_string_exception(mixed $value): void
    {
        $this->expectException(\Matmper\Exceptions\ValueIsNotStringException::class);

        $rule = app(\Matmper\Rules\NotHtmlRule::class);
        $rule->passes(fake()->word(), $value);
    }

    /**
     * Data Provider: test_not_html_string_exception
     *
     * @return array
     */
    public function testNotHtmlExceptionDataProvider(): array
    {
        return [
            'false_int' => [fake()->randomDigitNotZero()],
            'false_float' => [fake()->randomFloat(2)],
            'false_array' => [[1, 2, 3]],
        ];
    }
}
