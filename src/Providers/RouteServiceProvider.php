<?php

namespace TypiCMS\Modules\Translations\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Translations\Http\Controllers\AdminController;
use TypiCMS\Modules\Translations\Http\Controllers\ApiController;

class RouteServiceProvider extends ServiceProvider
{
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
                $router->get('translations', [AdminController::class, 'index'])->name('admin::index-translations')->middleware('can:read translations');
                $router->get('translations/create', [AdminController::class, 'create'])->name('admin::create-translation')->middleware('can:create translations');
                $router->get('translations/{translation}/edit', [AdminController::class, 'edit'])->name('admin::edit-translation')->middleware('can:read translations');
                $router->post('translations', [AdminController::class, 'store'])->name('admin::store-translation')->middleware('can:create translations');
                $router->put('translations/{translation}', [AdminController::class, 'update'])->name('admin::update-translation')->middleware('can:update translations');
            });

            /*
             * API routes
             */
            $router->middleware('api')->prefix('api')->group(function (Router $router) {
                $router->middleware('auth:api')->group(function (Router $router) {
                    $router->get('translations', [ApiController::class, 'index'])->middleware('can:read translations');
                    $router->patch('translations/{translation}', [ApiController::class, 'updatePartial'])->middleware('can:update translations');
                    $router->delete('translations/{translation}', [ApiController::class, 'destroy'])->middleware('can:delete translations');
                });
            });
        });
    }
}
