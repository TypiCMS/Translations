<?php

namespace TypiCMS\Modules\Translations\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Translations\Http\Requests\FormRequest;
use TypiCMS\Modules\Translations\Models\Translation;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('translations::admin.index');
    }

    public function create(): View
    {
        $model = new Translation();

        return view('translations::admin.create')
            ->with(compact('model'));
    }

    public function edit(Translation $translation): View
    {
        return view('translations::admin.edit')
            ->with(['model' => $translation]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $translation = Translation::create($request->validated());

        return $this->redirect($request, $translation);
    }

    public function update(Translation $translation, FormRequest $request): RedirectResponse
    {
        $translation->update($request->validated());

        return $this->redirect($request, $translation);
    }
}
