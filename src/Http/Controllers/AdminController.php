<?php

namespace TypiCMS\Modules\Translations\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Translations\Http\Requests\FormRequest;
use TypiCMS\Modules\Translations\Models\Translation;

class AdminController extends BaseAdminController
{
    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('translations::admin.index');
    }

    /**
     * Create form for a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = new;

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
        $translation = ::create($request->all());

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
        ::update($request->id, $request->all());

        return $this->redirect($request, $translation);
    }
}
