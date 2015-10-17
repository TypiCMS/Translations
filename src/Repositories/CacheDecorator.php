<?php

namespace TypiCMS\Modules\Translations\Repositories;

use TypiCMS\Modules\Core\Repositories\CacheAbstractDecorator;
use TypiCMS\Modules\Core\Services\Cache\CacheInterface;

class CacheDecorator extends CacheAbstractDecorator implements TranslationInterface
{
    public function __construct(TranslationInterface $repo, CacheInterface $cache)
    {
        $this->repo = $repo;
        $this->cache = $cache;
    }

    /**
     * Get translations to Array.
     *
     * @return array
     */
    public function allToArray($locale, $group, $namespace = null)
    {
        $cacheKey = md5(config('app.locale').'TranslationsToArray');

        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $data = $this->repo->allToArray($locale, $group, $namespace);

        // Store in cache for next request
        $this->cache->put($cacheKey, $data);

        return $data;
    }
}
