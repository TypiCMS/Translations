<?php

namespace TypiCMS\Modules\Translations\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'TypiCMS\Modules\Translations\Http\Controllers';

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        Route::namespace($this->namespace)->group(function (Router $router) {
            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('translations', 'AdminController@index')->name('admin::index-translations')->middleware('can:see-all-translations');
                $router->get('translations/create', 'AdminController@create')->name('admin::create-translation')->middleware('can:create-translation');
                $router->get('translations/{translation}/edit', 'AdminController@edit')->name('admin::edit-translation')->middleware('can:update-translation');
                $router->post('translations', 'AdminController@store')->name('admin::store-translation')->middleware('can:create-translation');
                $router->put('translations/{translation}', 'AdminController@update')->name('admin::update-translation')->middleware('can:update-translation');
            });

            /*
             * API routes
             */
            $router->middleware('api')->prefix('api')->group(function (Router $router) {
                $router->middleware('auth:api')->group(function (Router $router) {
                    $router->get('translations', 'ApiController@index')->middleware('can:see-all-translations');
                    $router->patch('translations/{translation}', 'ApiController@updatePartial')->middleware('can:update-translation');
                    $router->delete('translations/{translation}', 'ApiController@destroy')->middleware('can:delete-translation');
                });
            });
        });
    }
}
