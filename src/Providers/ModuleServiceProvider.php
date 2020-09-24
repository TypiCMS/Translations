<?php

namespace TypiCMS\Modules\Translations\Providers;

use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Translations\Composers\SidebarViewComposer;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'typicms.translations');
        $this->mergeConfigFrom(__DIR__.'/../config/permissions.php', 'typicms.permissions');

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['translations' => []], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'translations');

        $this->publishes([
            __DIR__.'/../database/migrations/create_translations_table.php.stub' => getMigrationFileName('create_translations_table'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/translations'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../database/seeders/TranslationSeeder.php' => database_path('seeders/TranslationSeeder.php'),
        ], 'seeders');

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

        $app->bind('Translations', Translation::class);
    }
}
