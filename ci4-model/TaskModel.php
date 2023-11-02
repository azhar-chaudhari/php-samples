<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description'];

    public function getCachedUsers()
    {
        $key = 'cached_tasks';
        $cacheTime = 3600; // Cache for 1 hour

        return $this->getCachedData($key, function () {
            return $this->findAll(); // Fetch users from database
        }, $cacheTime);
    }
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
}
