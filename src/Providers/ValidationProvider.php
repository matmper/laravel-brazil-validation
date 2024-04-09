<?php

namespace Matmper\Providers;

use Illuminate\Support\ServiceProvider;

class ValidationProvider extends ServiceProvider
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        /**
         * @var array<\Matmper\Contracts\RuleContract> $services
         */
        $services = [
            'cep' => $this->app->make(\Matmper\Rules\CepRule::class),
            'document' => $this->app->make(\Matmper\Rules\DocumentNumberRule::class),
            'not_html' => $this->app->make(\Matmper\Rules\NotHtmlRule::class),
        ];

        foreach ($services as $name => $class) {
            // @phpstan-ignore-next-line
            $this->app['validator']->extend($name, function ($attribute, $value, $params) use ($class) {
                return $class->params($params)->passes($attribute, $value);
            }, $class->message());
        }
    }
}
