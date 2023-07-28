<?php

namespace App\Libraries;

class DataTable
{
    protected $db;
    protected $query;
    protected $columns;
    protected $searchableColumns;
    protected $defaultOrderColumn;
    protected $defaultOrderDirection;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->query = null;
        $this->columns = [];
        $this->searchableColumns = [];
        $this->defaultOrderColumn = null;
        $this->defaultOrderDirection = null;
    }

    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    public function setSearchableColumns($searchableColumns)
    {
        $this->searchableColumns = $searchableColumns;
    }

    public function setDefaultOrder($column, $direction = 'asc')
    {
        $this->defaultOrderColumn = $column;
        $this->defaultOrderDirection = $direction;
    }

    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function fetch($request)
    {
        $totalRecords = $this->db->table('(' . $this->query . ') temp')->countAllResults();

        $searchValue = $request->getPost('search')['value'] ?? '';

        if (!empty($searchValue)) {
            $this->query = $this->applySearch($this->query, $searchValue);
        }

        $this->query = $this->applyOrder($this->query, $request->getPost('order', []));

        $limit = $request->getPost('length');
        $offset = $request->getPost('start');
        $query = $this->query . " LIMIT $limit OFFSET $offset";

        $result = $this->db->query($query)->getResult();

        return [
            'draw' => $request->getPost('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $result,
        ];
    }

    protected function applySearch($query, $searchValue)
    {
        foreach ($this->searchableColumns as $column) {
            $query = $query->orLike($column, $searchValue);
        }

        return $query;
    }

    protected function applyOrder($query, $order)
    {
        foreach ($order as $item) {
            $column = $this->columns[$item['column']]['data'];
            $direction = $item['dir'];
            $query = $query->orderBy($column, $direction);
        }

        if (!$order && $this->defaultOrderColumn) {
            $query = $query->orderBy($this->defaultOrderColumn, $this->defaultOrderDirection);
        }

        return $query;
    }
}
