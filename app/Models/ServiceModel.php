<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function service($perPage)
    {
        //Pagination ==============================
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        $this->db->connect();
        $builder = $this->db->table('services');
        $data = $builder
            ->select("*")
            ->get($perPage, $offset)
            ->getResult();

        $total = $builder->countAllResults();

        return [
            'data' => $data,
            'pager' => $pager->makeLinks($page, $perPage, $total, 'mypagination'),
            'totalData' => $total,
        ];
    }

    public function serviceSearch($perPage, $search)
    {
        //Pagination ==============================
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        $this->db->connect();
        $builder = $this->db->table('services');
        $data = $builder
            ->select("*")
            //search parameter
            ->like('name', $search)
            ->get($perPage, $offset)
            ->getResult();

        $total = $builder->countAllResults();

        return [
            'data' => $data,
            'pager' => $pager->makeLinks($page, $perPage, $total, 'mypagination'),
            'totalData' => $total,
        ];
    }
}
