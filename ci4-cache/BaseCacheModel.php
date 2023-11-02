<?php
// app/Models/BaseCacheModel.php

namespace App\Models;

use CodeIgniter\Model;

class BaseCacheModel extends Model
{
    protected $cache;

    public function __construct()
    {
        parent::__construct();

        // Load the caching library
        $this->cache = \Config\Services::cache();
    }

    protected function getCachedData($key, $fetchCallback, $cacheTime = 3600)
    {
        $cachedData = $this->cache->get($key);

        if ($cachedData === null) {
            // Data not found in cache, fetch from callback and store in cache
            $data = $fetchCallback();

            // Store in cache for the specified time
            $this->cache->save($key, $data, $cacheTime);

            return $data;
        }

        return $cachedData;
    }
}
