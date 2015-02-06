<?php
namespace TypiCMS\Modules\Translations\Providers;

use Config;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Lang;
use TypiCMS\Modules\Translations\Models\Translation;
use TypiCMS\Modules\Translations\Repositories\CacheDecorator;
use TypiCMS\Modules\Translations\Repositories\EloquentTranslation;
use TypiCMS\Modules\Translations\Services\Form\TranslationForm;
use TypiCMS\Modules\Translations\Services\Form\TranslationFormLaravelValidator;
use TypiCMS\Services\Cache\LaravelCache;
use View;

class ModuleProvider extends ServiceProvider
{

    public function boot()
    {
        // Bring in the routes
        require __DIR__ . '/../routes.php';

        // Add dirs
        View::addNamespace('translations', __DIR__ . '/../views/');
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'translations');
        $this->publishes([
            __DIR__ . '/../config/' => config_path('typicms/translations'),
        ], 'config');
        $this->publishes([
            __DIR__ . '/../migrations/' => base_path('/database/migrations'),
        ], 'migrations');
    }

    public function register()
    {

        $app = $this->app;

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

        $app->bind('TypiCMS\Modules\Translations\Services\Form\TranslationForm', function (Application $app) {
            return new TranslationForm(
                new TranslationFormLaravelValidator($app['validator']),
                $app->make('TypiCMS\Modules\Translations\Repositories\TranslationInterface')
            );
        });

    }
}
