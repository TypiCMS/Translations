<?php

namespace TypiCMS\Modules\Translations\Repositories;

use Illuminate\Support\Facades\DB;
use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Translations\Models\Translation;

class EloquentTranslation extends EloquentRepository
{
    protected $repositoryId = 'translations';

    protected $model = Translation::class;

    /**
     * Get translations to Array.
     *
     * @return array
     */
    public function allToArray($locale, $group, $namespace = null)
    {
        $array = DB::table('translations')
                ->select(DB::raw("translation->>'$.".$locale."' AS translation"), 'key')
                ->where('group', $group)
                ->pluck('translation', 'key')
                ->all();

        return $array;
    }
}
