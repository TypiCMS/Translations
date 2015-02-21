<?php
namespace TypiCMS\Modules\Translations\Providers;

use Config;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Lang;
use TypiCMS\Modules\Translations\Models\Translation;
use TypiCMS\Modules\Translations\Repositories\CacheDecorator;
use TypiCMS\Modules\Translations\Repositories\EloquentTranslation;
use TypiCMS\Services\Cache\LaravelCache;
use View;

class ModuleProvider extends ServiceProvider
{

    public function boot()
    {

        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'typicms.translations'
        );

        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'translations');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'translations');

        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/vendor/translations'),
        ], 'views');
        $this->publishes([
            __DIR__ . '/../database' => base_path('/database'),
        ], 'migrations');
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
        $app->view->composer('core::admin._sidebar', 'TypiCMS\Modules\Translations\Composers\SideBarViewComposer');

        $app->bind('TypiCMS\Modules\Translations\Repositories\TranslationInterface', function (Application $app) {
            $repository = new EloquentTranslation(
                new Translation
            );
            if (! Config::get('app.cache')) {
                return $repository;
            }
            $laravelCache = new LaravelCache($app['cache'], 'translations', 10);

            return new CacheDecorator($repository, $laravelCache);
        });

    }
}
