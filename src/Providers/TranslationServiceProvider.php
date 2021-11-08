<?php

namespace TypiCMS\Modules\Translations\Providers;

use Illuminate\Translation\TranslationServiceProvider as LaravelTranslationServiceProvider;
use TypiCMS\Modules\Translations\Loaders\MixedLoader;

class TranslationServiceProvider extends LaravelTranslationServiceProvider
{
    /**
     * Register the translation line loader.
     */
    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function ($app) {
            return new MixedLoader($app['files'], $app['path.lang']);
        });
    }
}
