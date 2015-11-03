<?php

namespace TypiCMS\Modules\Translations\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        $rules = [
            'key' => 'required|max:255',
        ];

        return $rules;
    }
}
