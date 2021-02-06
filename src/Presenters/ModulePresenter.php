<?php

namespace TypiCMS\Modules\Translations\Presenters;

use TypiCMS\Modules\Core\Presenters\Presenter;

class ModulePresenter extends Presenter
{
    /**
     * Return name.
     */
    public function title(): string
    {
        return $this->entity->key;
    }
}
