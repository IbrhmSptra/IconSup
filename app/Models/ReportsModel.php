<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'reports';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'pesan', 'id_services', 'urgency', 'created_at', 'status', 'status_date'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'status_date';
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

    // -------------------------------- CUSTOM QUERY HISTORY TICKET USER -----------------------------------------------

    public function history($perPage, $userid)
    {
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;
        $this->db->connect();
        $builder = $this->db->table('reports');
        $data = $builder
            ->select('services.name as service_name, reports.id, reports.id_user, reports.status, reports.pesan, reports.created_at, reports.status_date')
            ->where('reports.id_user', $userid)
            ->join('services', 'services.id = reports.id_services')
            ->orderBy('(CASE WHEN reports.status IS NULL THEN 1 WHEN "Solved" THEN 2 ELSE 3 END)', 'ASC') //urutkan yang pending dulu ->solved lalu declined
            ->orderBy('reports.created_at', 'DESC') //urut berdasasrkan terbaru
            ->get($perPage, $offset)
            ->getResult();

        $total = $builder->where('reports.id_user', $userid)->countAllResults();
        return [
            'data' => $data,
            'pager' => $pager->makeLinks($page, $perPage, $total, 'mypagination'),
            'totalData' => $total
        ];
    }
    // -------------------------------- end of CUSTOM QUERY HISTORY TICKET USER -----------------------------------------------








    //-------------------------------- CUSTOM QUERY REPORTS PENDING ----------------------------------------------------------
    public function reportpending($perPage)
    {
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;
        $this->db->connect();
        $builder = $this->db->table('reports');
        $data = $builder
            ->where('reports.urgency IS NOT NULL AND reports.status IS NULL')
            ->select('users.id as user_id, users.username, services.name as service_name, reports.id, reports.status, reports.pesan, reports.urgency, reports.created_at')
            ->join('users', 'users.id = reports.id_user')
            ->join('services', 'services.id = reports.id_services')
            ->orderBy('(CASE reports.urgency WHEN "High" THEN 1 WHEN "Medium" THEN 2 ELSE 3 END)', 'ASC') //urut berdasarkan high -> low
            ->orderBy('reports.created_at', 'ASC') //urut berdasasrkan terlama
            ->get($perPage, $offset)
            ->getResult();

        $total = $builder->where('reports.urgency IS NOT NULL AND reports.status IS NULL')->countAllResults();

        return [
            'data' => $data,
            'pager' => $pager->makeLinks($page, $perPage, $total, 'mypagination'),
            'totalData' => $total,
        ];
    }
    public function reportpendingSearch($perPage, $search)
    {
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $this->db->connect();
        $offset = ($page - 1) * $perPage;
        $builder = $this->db->table('reports');
        $data = $builder
            ->where('reports.urgency IS NOT NULL AND reports.status IS NULL')
            ->select('users.id as user_id, users.username, services.name as service_name, reports.id, reports.status, reports.pesan, reports.urgency, reports.created_at')
            ->join('users', 'users.id = reports.id_user')
            ->join('services', 'services.id = reports.id_services')
            ->orderBy('(CASE reports.urgency WHEN "High" THEN 1 WHEN "Medium" THEN 2 ELSE 3 END)', 'ASC')
            ->orderBy('reports.created_at', 'ASC')
            //search parameter
            ->like('services.name', $search)
            ->orLike('urgency', $search)
            ->orLike('pesan', $search)
            ->orLike('reports.created_at', $search)
            ->orLike('username', $search)
            ->orLike('users.id', $search)
            ->get($perPage, $offset)
            ->getResult();

        $total = $builder->where('reports.urgency IS NOT NULL AND reports.status IS NULL')->countAllResults();

        return [
            'data' => $data,
            'pager' => $pager->makeLinks($page, $perPage, $total, 'mypagination'),
            'totalData' => $total,
        ];
    }
    //--------------------------------end of CUSTOM QUERY REPORTS PENDING ----------------------------------------------------------





    //--------------------------------CUSTOM QUERY REPORTS SOLVED----------------------------------------------------------
    public function reportsolved($perPage)
    {
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $this->db->connect();
        $offset = ($page - 1) * $perPage;
        $builder = $this->db->table('reports');
        $data = $builder
            ->select('users.id as user_id, users.username, services.name as service_name, reports.id, reports.pesan, reports.urgency, reports.created_at, reports.status_date as solved_on')
            ->where('reports.urgency IS NOT NULL AND reports.status = "Solved"')
            ->join('users', 'users.id = reports.id_user')
            ->join('services', 'services.id = reports.id_services')
            ->orderBy('solved_on', 'DESC') //urut berdasasrkan terbaru
            ->get($perPage, $offset)
            ->getResult();

        $total = $builder->where('reports.urgency IS NOT NULL AND reports.status = "Solved"')->countAllResults();

        return [
            'data' => $data,
            'pager' => $pager->makeLinks($page, $perPage, $total, 'mypagination'),
            'totalData' => $total,
        ];
    }
    public function reportsolvedSearch($perPage, $search)
    {
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $this->db->connect();
        $offset = ($page - 1) * $perPage;
        $builder = $this->db->table('reports');
        $data = $builder
            ->select('users.id as user_id, users.username, services.name as service_name, reports.id, reports.pesan, reports.urgency, reports.created_at, reports.status_date as solved_on')
            ->where('reports.urgency IS NOT NULL AND reports.status = "Solved"')
            ->join('users', 'users.id = reports.id_user')
            ->join('services', 'services.id = reports.id_services')
            ->orderBy('solved_on', 'DESC')
            //search parameter
            ->like('services.name', $search)
            ->orLike('urgency', $search)
            ->orLike('reports.created_at', $search)
            ->orLike('reports.status_date', $search)
            ->orLike('username', $search)
            ->orLike('users.id', $search)
            ->orLike('pesan', $search)
            ->get($perPage, $offset)
            ->getResult();

        $total = $builder->where('reports.urgency IS NOT NULL AND reports.status = "Solved"')->countAllResults();

        return [
            'data' => $data,
            'pager' => $pager->makeLinks($page, $perPage, $total, 'mypagination'),
            'totalData' => $total,
        ];
    }
    //--------------------------------end of CUSTOM QUERY REPORTS SOLVED----------------------------------------------------------




    //-------------------------------- CUSTOM QUERY REPORTS DECLINED ----------------------------------------------------------
    public function reportdeclined($perPage)
    {
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $this->db->connect();
        $offset = ($page - 1) * $perPage;
        $builder = $this->db->table('reports');
        $data = $builder
            ->select('users.id as user_id, users.username, services.name as service_name, reports.id, reports.pesan, reports.urgency, reports.created_at, reports.status_date as declined_on')
            ->where('reports.urgency IS NOT NULL AND reports.status = "Declined"')
            ->join('users', 'users.id = reports.id_user')
            ->join('services', 'services.id = reports.id_services')
            ->orderBy('declined_on', 'DESC')
            ->get($perPage, $offset)
            ->getResult();

        $total = $builder->where('reports.urgency IS NOT NULL AND reports.status = "Declined"')->countAllResults();

        return [
            'data' => $data,
            'pager' => $pager->makeLinks($page, $perPage, $total, 'mypagination'),
            'totalData' => $total,
        ];
    }
    public function reportdeclinedSearch($perPage, $search)
    {
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $this->db->connect();
        $offset = ($page - 1) * $perPage;
        $builder = $this->db->table('reports');
        $data = $builder
            ->select('users.id as user_id, users.username, services.name as service_name, reports.id, reports.pesan, reports.urgency, reports.created_at, reports.status_date as declined_on')
            ->where('reports.urgency IS NOT NULL AND reports.status = "Declined"')
            ->join('users', 'users.id = reports.id_user')
            ->join('services', 'services.id = reports.id_services')
            ->orderBy('declined_on', 'DESC')
            //search parameter
            ->like('services.name', $search)
            ->orLike('urgency', $search)
            ->orLike('reports.created_at', $search)
            ->orLike('reports.status_date', $search)
            ->orLike('username', $search)
            ->orLike('users.id', $search)
            ->orLike('pesan', $search)
            ->get($perPage, $offset)
            ->getResult();

        $total = $builder->where('reports.urgency IS NOT NULL AND reports.status = "Declined"')->countAllResults();

        return [
            'data' => $data,
            'pager' => $pager->makeLinks($page, $perPage, $total, 'mypagination'),
            'totalData' => $total,
        ];
    }
    //-------------------------------- end of CUSTOM QUERY REPORTS DECLINED ----------------------------------------------------------
}
