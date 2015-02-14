<?php
Route::bind('translations', function ($value) {
    return TypiCMS\Modules\Translations\Models\Translation::where('id', $value)
        ->with('translations')
        ->firstOrFail();
});

Route::group(
    array(
        'namespace' => 'TypiCMS\Modules\Translations\Http\Controllers',
        'prefix'    => 'admin',
    ),
    function () {
        Route::resource('translations', 'AdminController');
    }
);

Route::group(['prefix'=>'api'], function() {
    Route::resource('translations', 'ApiController');
});
