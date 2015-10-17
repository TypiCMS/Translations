<?php

namespace TypiCMS\Modules\Translations\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\TranslationServiceProvider as LaravelTranslationServiceProvider;
use TypiCMS\Modules\Translations\Loaders\MixedLoader;

class TranslationServiceProvider extends LaravelTranslationServiceProvider
{
    /**
     * Register the translation line loader.
     *
     * @return void
     */
    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function (Application $app) {
            $repository = $app->make('TypiCMS\Modules\Translations\Repositories\TranslationInterface');
            $fileLoader = new FileLoader($app['files'], $app['path.lang']);

            return new MixedLoader($fileLoader, $repository);
        });
    }
}
