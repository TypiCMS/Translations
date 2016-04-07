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
            $router->get('admin/translations', 'AdminController@index')->name('admin::index-translations');
            $router->get('admin/translations/create', 'AdminController@create')->name('admin::create-translation');
            $router->get('admin/translations/{translation}/edit', 'AdminController@edit')->name('admin::edit-translation');
            $router->post('admin/translations', 'AdminController@store')->name('admin::store-translation');
            $router->put('admin/translations/{translation}', 'AdminController@update')->name('admin::update-translation');

            /*
             * API routes
             */
            $router->get('api/translations', 'ApiController@index')->name('api::index-translations');
            $router->put('api/translations/{translation}', 'ApiController@update')->name('api::update-translation');
            $router->delete('api/translations/{translation}', 'ApiController@destroy')->name('api::destroy-translation');
        });
    }
}
