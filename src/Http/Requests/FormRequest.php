<?php
namespace TypiCMS\Modules\Translations\Http\Requests;

use TypiCMS\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest {

    public function rules()
    {
        $rules = [
            'key' => 'required',
        ];
        return $rules;
    }
}
