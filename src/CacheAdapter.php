<?php

namespace rasteiner\KirbyHyphens;

use Kirby\Cache\Cache;
use Vanderlee\Syllable\Cache\Cache as ICache;


class CacheAdapter implements ICache
{
    protected ?array $data;
    protected ?string $language = null;
    
    public function __construct(protected Cache $cache)
    {}

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        return $this->data[$key] ?? null;
    }

    public function __isset($key) {
        return isset($this->data[$key]);
    }

    public function __unset($key) {
        unset($this->data[$key]);
    }

    public function open($language) {
        $this->data = $this->cache->get($language);
        $this->language = $language;
    }

    public function close() {
        $this->cache->set($this->language, $this->data);
        $this->language = null;
    }
}