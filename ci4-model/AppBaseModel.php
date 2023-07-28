<?php

namespace App\Models;

use CodeIgniter\Model;

class AppBaseModel extends Model
{

    protected $DBGroup = 'default';
    protected $table = 'testimonials';
    protected $primaryKey = 'testimonial_id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ["testimonial_name", "testimonial_company", "testimonial_designation", "testimonial_image", "testimonial_content",];

    public function getCount($table = '', $column = '')
    {
        $result = $this->db->table($table)->select('count(' . $column . ') as value')->get()->getRowArray();
        return !empty($result) ? $result['value'] : '';
    }
    public function getSingleRow($table = '', $query = '')
    {
        return $this->db->table($table)->select($query)->limit(1)->get()->getRowArray();
    }
    public function getRows($table = '', $query = '')
    {
        return $this->db->table($table)->select($query)->get()->getResultArray();
    }

    
    protected function generateSearchValueCondition($searchValue, $fieldNames,$primaryKey)
    {
        $conditions = [];

        foreach ($fieldNames as $fieldName) {
            $conditions[] = $fieldName . " like '%" . $searchValue . "%'";
        }

        if (!empty($conditions)) {
            $condition = "(" . implode(" OR ", $conditions) . ")";
        } else {
            $condition = $primaryKey."!= ''";
        }

        return $condition;
    }
}
