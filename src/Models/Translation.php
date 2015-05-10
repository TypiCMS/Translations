<?php
namespace TypiCMS\Modules\Translations\Models;

use Dimsav\Translatable\Translatable;
use Laracasts\Presenter\PresentableTrait;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\History\Traits\Historable;

class Translation extends Base
{

    use Historable;
    use PresentableTrait;
    use Translatable;

    protected $presenter = 'TypiCMS\Modules\Translations\Presenters\ModulePresenter';

    protected $fillable = array(
        'group',
        'key',
        // Translatable columns
        'translation'
    );

    /**
     * Translatable model configs.
     *
     * @var array
     */
    public $translatedAttributes = array(
        'translation'
    );

    protected $appends = ['translation'];

    /**
     * Get translation attribute from translation table
     *
     * @return string
     */
    public function getTranslationAttribute($value)
    {
        return $this->translation;
    }
}
