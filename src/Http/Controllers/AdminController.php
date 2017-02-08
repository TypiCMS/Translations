<?php

namespace TypiCMS\Modules\Translations\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Translations\Http\Requests\FormRequest;
use TypiCMS\Modules\Translations\Models\Translation;
use TypiCMS\Modules\Translations\Repositories\EloquentTranslation;

class AdminController extends BaseAdminController
{
    public function __construct(EloquentTranslation $translation)
    {
        parent::__construct($translation);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->findAll();
        app('JavaScript')->put('models', $models);

        return view('translations::admin.index');
    }

    /**
     * Create form for a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = $this->repository->createModel();

        return view('translations::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Translations\Models\Translation $translation
     *
     * @return \Illuminate\View\View
     */
    public function edit(Translation $translation)
    {
        return view('translations::admin.edit')
            ->with(['model' => $translation]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Translations\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $translation = $this->repository->create($request->all());

        return $this->redirect($request, $translation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Translations\Models\Translation        $translation
     * @param \TypiCMS\Modules\Translations\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Translation $translation, FormRequest $request)
    {
        $this->repository->update($request->id, $request->all());

        return $this->redirect($request, $translation);
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
