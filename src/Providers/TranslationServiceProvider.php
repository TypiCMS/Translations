<?php

namespace TypiCMS\Modules\Translations\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Translation\TranslationServiceProvider as LaravelTranslationServiceProvider;
use TypiCMS\Modules\Translations\Loaders\MixedLoader;
use TypiCMS\Modules\Translations\Models\Translation;

class TranslationServiceProvider extends LaravelTranslationServiceProvider
{
    /**
     * Register the translation line loader.
     *
     * @return null
     */
    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function (Application $app) {
            $repository = new Translation();

            return new MixedLoader($app['files'], $app['path.lang'], $repository);
        });
    }
}
