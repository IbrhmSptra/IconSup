<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReportsModel;

class Reports extends BaseController
{
    public function reportsPending()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('reports');
        $builder->select('users.id as user_id, users.username, services.name as service_name, reports.id, reports.status, reports.pesan, reports.urgency, reports.created_at');
        $builder->join('users', 'users.id = reports.id_user');
        $builder->join('services', 'services.id = reports.id_services');
        $builder->where('reports.urgency IS NOT NULL AND reports.status IS NULL');
        $builder->orderBy('(CASE reports.urgency WHEN "High" THEN 1 WHEN "Medium" THEN 2 ELSE 3 END)', 'ASC');
        $builder->orderBy('reports.created_at', 'ASC');
        $query = $builder->get();
        $data = [
            "reports" => $query->getResult()
        ];

        return view("/admin/content/reportspending", $data);
    }

    public function updateSolved($id = null)
    {
        $session = \Config\Services::session();
        $reportmodel = new ReportsModel();
        $payload = [
            "status" => "Solved",
        ];
        $reportmodel->update($id, $payload);
        $session->setFlashdata('solved', 'berhasil');
        return redirect()->to('/reportspending');
    }

    public function updateDeclined($id = null)
    {
        $session = \Config\Services::session();
        $reportmodel = new ReportsModel();
        $payload = [
            "status" => "Declined",
        ];
        $reportmodel->update($id, $payload);
        $session->setFlashdata('declined', 'berhasil');
        return redirect()->to('/reportspending');
    }
}
