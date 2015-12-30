<?php

namespace TypiCMS\Modules\Translations\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Translations\Http\Requests\FormRequest;
use TypiCMS\Modules\Translations\Models\Translation;
use TypiCMS\Modules\Translations\Repositories\TranslationInterface;

class AdminController extends BaseAdminController
{
    public function __construct(TranslationInterface $translation)
    {
        parent::__construct($translation);
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
        $this->repository->update($request->all());

        return $this->redirect($request, $translation);
    }
}
