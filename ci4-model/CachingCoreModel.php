<?php
namespace App\Models;

use CodeIgniter\Model;

class CachingCoreModel extends CoreModel
{
    protected $cache;
    protected $cacheTime = 3600; // Default cache time in seconds (1 hour)

    public function __construct()
    {
        parent::__construct();

        // Load the caching library
        $this->cache = \Config\Services::cache();
    }

    // Override the getCoreResultArray method to include caching
    public function getCachedCoreResultArray($groupBy, $select = '*')
    {
        $cacheKey = 'cached_' . $this->table . '_result_' . md5($groupBy . $select);
        
        return $this->getCachedData($cacheKey, function () use ($groupBy, $select) {
            return parent::getCoreResultArray($groupBy, $select);
        });
    }

    // Override the getRowById method to include caching
    public function getCachedRowById($id, $select = '*')
    {
        $cacheKey = 'cached_' . $this->table . '_row_' . md5($id . $select);
        
        return $this->getCachedData($cacheKey, function () use ($id, $select) {
            return parent::getRowById($id, $select);
        });
    }

    // Add the getCachedData method for caching
    protected function getCachedData($cacheKey, $fetchCallback)
    {
        $cachedData = $this->cache->get($cacheKey);

        if ($cachedData === null) {
            $data = $fetchCallback();

            // Store in cache for the specified time
            $this->cache->save($cacheKey, $data, $this->cacheTime);

            return $data;
        }

        return $cachedData;
    }

    // Override other methods as needed to include caching functionality
}
