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
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['translations' => []], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'translations');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/translations'),
        ], 'typicms-views');

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Translations', EloquentTranslation::class);
    }
}
