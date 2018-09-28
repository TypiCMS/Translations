<?php

namespace TypiCMS\Modules\Translations\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Translations\Models\Translation;
use TypiCMS\Modules\Translations\Repositories\EloquentTranslation;

class ApiController extends BaseApiController
{
    public function __construct(EloquentTranslation $translation)
    {
        parent::__construct($translation);
    }

    public function index(Request $request)
    {
        $data = QueryBuilder::for(Translation::class)
            ->translated($request->input('translatable_fields'))
            ->paginate($request->input('per_page'));

        return $data;
    }

    public function destroy(Translation $translation)
    {
        $deleted = $this->repository->delete($translation);

        return response()->json([
            'error' => !$deleted,
        ]);
    }
}
