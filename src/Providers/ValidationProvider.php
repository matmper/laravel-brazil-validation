<?php

namespace Matmper\Providers;

use Illuminate\Support\ServiceProvider;

class ValidationProvider extends ServiceProvider
{
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
        $services = [
            'cep' => \Matmper\Rules\CepRule::class,
            'document' => \Matmper\Rules\DocumentNumberRule::class,
            'not_html' => \Matmper\Rules\NotHtmlRule::class,
        ];

        foreach ($services as $name => $service) {
            $class = app($service);

            $this->app['validator']->extend($name, function ($attribute, $value, $params) use ($class) {
                return $class->params($params)->passes($attribute, $value);
            }, $class->message());
        }
    }
}
