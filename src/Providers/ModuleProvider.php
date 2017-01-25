<?php

namespace TypiCMS\Modules\Translations\Providers;

use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Translations\Composers\SidebarViewComposer;
use TypiCMS\Modules\Translations\Repositories\EloquentTranslation;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.translations'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['translations' => []], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'translations');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'translations');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/translations'),
        ], 'views');
        $this->publishes([
            __DIR__.'/../database' => base_path('database'),
        ], 'migrations');
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        /*
         * Sidebar view composer
         */
        $app->view->composer('core::admin._sidebar', SidebarViewComposer::class);

        $app->bind('Translations', EloquentTranslation::class);
    }
}
