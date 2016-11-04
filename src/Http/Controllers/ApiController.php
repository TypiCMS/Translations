<?php

namespace TypiCMS\Modules\Translations\Http\Controllers;

use Illuminate\Support\Facades\Request;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Translations\Models\Translation;
use TypiCMS\Modules\Translations\Repositories\EloquentTranslation;

class ApiController extends BaseApiController
{
    public function __construct(EloquentTranslation $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $model = $this->repository->create(Request::all());
        $error = $model ? false : true;

        return response()->json([
            'error' => $error,
            'model' => $model,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $model
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        $updated = $this->repository->update(request('id'), Request::all());

        return response()->json([
            'error' => !$updated,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \TypiCMS\Modules\Translations\Models\Translation $translation
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Translation $translation)
    {
        $deleted = $this->repository->delete($translation);

        return response()->json([
            'error' => !$deleted,
        ]);
    }
}
