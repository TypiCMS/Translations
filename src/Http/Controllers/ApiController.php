<?php

namespace TypiCMS\Modules\Translations\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Translations\Models\Translation;

class ApiController extends BaseApiController
{
    public function index(Request $request)
    {
        $data = QueryBuilder::for(Translation::class)
            ->allowedFilters([
                Filter::custom('key,translation', FilterOr::class),
            ])
            ->translated($request->input('translatable_fields'))
            ->paginate($request->input('per_page'));

        return $data;
    }

    public function destroy(Translation $translation)
    {
        $deleted = $translation->delete();

        return response()->json([
            'error' => !$deleted,
        ]);
    }
}
