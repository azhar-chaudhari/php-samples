<?php

namespace App\Models;

use CodeIgniter\Model;

class CoreModel extends Model
{
    // Add any common functionalities or reusable functions here.

    public function getCoreResultArray($groupBy, $select = '*')
    {
        $this->select($select);
        $this->groupBy($groupBy);
        return $this->get()->getResultArray();
    }

    /**
     * Get a single row from the table based on the primary key.
     *
     * @param mixed $id The primary key value.
     * @param string $select Optional. The columns to select. Default is '*'.
     * @return array|null The row data as an associative array or null if not found.
     */
    public function getRowById($id, $select = '*')
    {
        $this->select($select);
        return $this->where($this->primaryKey, $id)->get()->getRowArray();
    }

    /**
     * Insert a new record into the table and return the inserted ID.
     *
     * @param array $data The data to be inserted.
     * @return int The inserted row's ID.
     */
    public function insertAndGetId($data)
    {
        $this->insert($data);
        return $this->getInsertID();
    }

    /**
     * Update a record in the table based on the primary key.
     *
     * @param mixed $id The primary key value.
     * @param array $data The data to be updated.
     * @return bool True if the update was successful, false otherwise.
     */
    public function updateById($id, $data)
    {
        return $this->where($this->primaryKey, $id)->update($data);
    }

    /**
     * Delete a record from the table based on the primary key.
     *
     * @param mixed $id The primary key value.
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function deleteById($id)
    {
        return $this->where($this->primaryKey, $id)->delete();
    }

    // Add more reusable functions here as needed.
}
