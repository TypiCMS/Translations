<?php

namespace TypiCMS\Modules\Translations\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Translations\Http\Controllers\AdminController;
use TypiCMS\Modules\Translations\Http\Controllers\ApiController;

class RouteServiceProvider extends ServiceProvider
{
    public function map()
    {
        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('translations', [AdminController::class, 'index'])->name('index-translations')->middleware('can:read translations');
            $router->get('translations/create', [AdminController::class, 'create'])->name('create-translation')->middleware('can:create translations');
            $router->get('translations/{translation}/edit', [AdminController::class, 'edit'])->name('edit-translation')->middleware('can:read translations');
            $router->post('translations', [AdminController::class, 'store'])->name('store-translation')->middleware('can:create translations');
            $router->put('translations/{translation}', [AdminController::class, 'update'])->name('update-translation')->middleware('can:update translations');
        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('translations', [ApiController::class, 'index'])->middleware('can:read translations');
            $router->patch('translations/{translation}', [ApiController::class, 'updatePartial'])->middleware('can:update translations');
            $router->delete('translations/{translation}', [ApiController::class, 'destroy'])->middleware('can:delete translations');
        });
    }
}
