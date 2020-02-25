<?php

namespace TypiCMS\Modules\Translations\Loaders;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\DB;
use Illuminate\Translation\FileLoader;
use TypiCMS\Modules\Translations\Models\Translation;

class MixedLoader extends FileLoader
{
    /**
     * Create a new file loader instance.
     *
     * @param string $path
     *
     * @return null
     */
    public function __construct(Filesystem $files, $path)
    {
        $this->path = $path;
        $this->files = $files;
    }

    /**
     * Load the messages strictly for the given locale.
     *
     * @param string $locale
     * @param string $group
     * @param string $namespace
     *
     * @return array
     */
    public function load($locale, $group, $namespace = null)
    {
        // Load from files
        if ($group == '*' && $namespace == '*') {
            return $this->loadJsonPaths($locale);
        }
        if (is_null($namespace) || $namespace == '*') {
            $translationsFromFiles = $this->loadPath($this->path, $locale, $group);
        } else {
            $translationsFromFiles = $this->loadNamespaced($locale, $group, $namespace);
        }

        // If group is 'db', get data from DB.
        $translationsFromDB = ($group == 'db') ? $this->loadFromDB($locale, $group, $namespace) : [];

        return array_merge($translationsFromFiles, $translationsFromDB);
    }

    /**
     * Load the messages from DB strictly for the given locale.
     *
     * @param string $group
     * @param string $namespace
     * @param string $locale
     *
     * @return array
     */
    public function loadFromDB($locale, $group, $namespace = null)
    {
        return Translation::select(DB::raw("JSON_UNQUOTE(JSON_EXTRACT(`translation`, '$.".$locale."')) AS translated"), 'key')
                ->where('group', $group)
                ->pluck('translated', 'key')
                ->all();
    }
}
