<?php

namespace TypiCMS\Modules\Translations\Models;

use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\Translations\Presenters\ModulePresenter;

class Translation extends Base
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = ['id', 'exit'];

    protected $appends = ['translation_translated'];

    public $translatable = [
        'translation',
    ];

    /**
     * Append translation_translated attribute.
     *
     * @return string
     */
    public function getTranslationTranslatedAttribute()
    {
        $locale = config('app.locale');
        return $this->translate('translation', config('typicms.content_locale', $locale));
    }
}
