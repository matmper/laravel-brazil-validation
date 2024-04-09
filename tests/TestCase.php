<?php declare(strict_types=1);

namespace Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @var \Illuminate\Foundation\Application;
     */
    protected $app;

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        $this->app = $app;

        $this->app->setBasePath(__DIR__ . '/..');

        /** @var \Illuminate\Support\Facades\Route $router */
        $router = $this->app['router'];
        $router->post('test', "\App\Controllers\TestController@index");
    }

    /**
     * Load custom package providers
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array<string>
     */
    protected function getPackageProviders($app): array
    {
        return ['Matmper\Providers\ValidationProvider'];
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
