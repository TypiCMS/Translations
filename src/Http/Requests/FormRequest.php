<?php

namespace TypiCMS\Modules\Translations\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'group' => 'required',
            'key' => 'required|max:255|unique:translations,key,'.$this->id,
            'translation.*' => 'nullable',
        ];
    }
}
