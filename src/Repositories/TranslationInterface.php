<?php

namespace TypiCMS\Modules\Translations\Repositories;

use TypiCMS\Modules\Core\Repositories\RepositoryInterface;

interface TranslationInterface extends RepositoryInterface
{
    /**
     * Get translations to Array.
     *
     * @return array
     */
    public function allToArray($locale, $group, $namespace = null);
}
