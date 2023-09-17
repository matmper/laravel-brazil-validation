<?php declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Application;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected $app = null;

    /**
     * @param Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        $this->app = $app;

        $this->app->setBasePath(__DIR__ . '/..');
    }

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }
}
