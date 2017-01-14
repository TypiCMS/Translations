<?php

namespace TypiCMS\Modules\Translations\Loaders;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\LoaderInterface;

class MixedLoader implements LoaderInterface
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The default path for the loader.
     *
     * @var string
     */
    protected $path;

    /**
     * Repository.
     *
     * @var \TypiCMS\Modules\Translations\Repositories\EloquentTranslation
     */
    protected $repository;

    /**
     * All of the namespace hints.
     *
     * @var array
     */
    protected $hints = [];

    /**
     * Create a new file loader instance.
     *
     * @param \Illuminate\Filesystem\Filesystem $files
     * @param string                            $path
     *
     * @return null
     */
    public function __construct(Filesystem $files, $path, $repository)
    {
        $this->path = $path;
        $this->files = $files;
        $this->repository = $repository;
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
     * Load a locale from a given path.
     *
     * @param string $path
     * @param string $locale
     * @param string $group
     *
     * @return array
     */
    protected function loadPath($path, $locale, $group)
    {
        if ($this->files->exists($full = "{$path}/{$locale}/{$group}.php")) {
            return $this->files->getRequire($full);
        }

        return [];
    }

    /**
     * Load a namespaced translation group.
     *
     * @param string $locale
     * @param string $group
     * @param string $namespace
     *
     * @return array
     */
    protected function loadNamespaced($locale, $group, $namespace)
    {
        if (isset($this->hints[$namespace])) {
            $lines = $this->loadPath($this->hints[$namespace], $locale, $group);

            return $this->loadNamespaceOverrides($lines, $locale, $group, $namespace);
        }

        return [];
    }

    /**
     * Load a local namespaced translation group for overrides.
     *
     * @param array  $lines
     * @param string $locale
     * @param string $group
     * @param string $namespace
     *
     * @return array
     */
    protected function loadNamespaceOverrides(array $lines, $locale, $group, $namespace)
    {
        $file = "{$this->path}/vendor/{$namespace}/{$locale}/{$group}.php";

        if ($this->files->exists($file)) {
            return array_replace_recursive($lines, $this->files->getRequire($file));
        }

        return $lines;
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
        return $this->repository->allToArray($locale, $group, $namespace);
    }

    /**
     * Add a new namespace to the loader.
     *
     * @param string $namespace
     * @param string $hint
     *
     * @return void
     */
    public function addNamespace($namespace, $hint)
    {
        $this->hints[$namespace] = $hint;
    }

    /**
     * Get an array of all the registered namespaces.
     *
     * @return array
     */
    public function namespaces() {
        return $this->hints;
    }
}
