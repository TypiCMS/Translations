<?php

namespace TypiCMS\Modules\Translations\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

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
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function (Router $router) {
            /*
             * Admin routes
             */
            $router->get('admin/translations', ['as' => 'admin.translations.index', 'uses' => 'AdminController@index']);
            $router->get('admin/translations/create', ['as' => 'admin.translations.create', 'uses' => 'AdminController@create']);
            $router->get('admin/translations/{translation}/edit', ['as' => 'admin.translations.edit', 'uses' => 'AdminController@edit']);
            $router->post('admin/translations', ['as' => 'admin.translations.store', 'uses' => 'AdminController@store']);
            $router->put('admin/translations/{translation}', ['as' => 'admin.translations.update', 'uses' => 'AdminController@update']);

            /*
             * API routes
             */
            $router->get('api/translations', ['as' => 'api.translations.index', 'uses' => 'ApiController@index']);
            $router->put('api/translations/{translation}', ['as' => 'api.translations.update', 'uses' => 'ApiController@update']);
            $router->delete('api/translations/{translation}', ['as' => 'api.translations.destroy', 'uses' => 'ApiController@destroy']);
        });
    }
}
