<?php

namespace TypiCMS\Modules\Translations\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Translations\Composers\SidebarViewComposer;
use TypiCMS\Modules\Translations\Models\Translation;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'typicms.translations');
        $this->mergeConfigFrom(__DIR__.'/../config/permissions.php', 'typicms.permissions');

        $this->loadViewsFrom(__DIR__.'/../../resources/views/', 'translations');

        $this->publishes([
            __DIR__.'/../../database/migrations/create_translations_table.php.stub' => getMigrationFileName('create_translations_table'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/translations'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../../database/seeders/TranslationSeeder.php' => database_path('seeders/TranslationSeeder.php'),
        ], 'seeders');

        View::composer('core::admin._sidebar', SidebarViewComposer::class);
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Translations', Translation::class);
    }
}
