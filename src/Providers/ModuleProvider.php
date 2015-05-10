<?php
namespace TypiCMS\Modules\Translations\Providers;

use Config;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Lang;
use TypiCMS\Modules\Translations\Models\Translation;
use TypiCMS\Modules\Translations\Repositories\CacheDecorator;
use TypiCMS\Modules\Translations\Repositories\EloquentTranslation;
use TypiCMS\Modules\Core\Services\Cache\LaravelCache;
use View;

class ModuleProvider extends ServiceProvider
{

    public function boot()
    {

        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'typicms.translations'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['translations' => []], $modules));

        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'translations');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'translations');

        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/translations'),
        ], 'views');
        $this->publishes([
            __DIR__ . '/../database' => base_path('database'),
        ], 'migrations');
        $this->publishes([
            __DIR__ . '/../../tests' => base_path('tests'),
        ], 'tests');
    }

    public function register()
    {

        $app = $this->app;

        /**
         * Register route service provider
         */
        $app->register('TypiCMS\Modules\Translations\Providers\RouteServiceProvider');

        /**
         * Sidebar view composer
         */
        $app->view->composer('core::admin._sidebar', 'TypiCMS\Modules\Translations\Composers\SidebarViewComposer');

        $app->bind('TypiCMS\Modules\Translations\Repositories\TranslationInterface', function (Application $app) {
            $repository = new EloquentTranslation(
                new Translation
            );
            if (! config('typicms.cache')) {
                return $repository;
            }
            $laravelCache = new LaravelCache($app['cache'], 'translations', 10);

            return new CacheDecorator($repository, $laravelCache);
        });

    }
}
