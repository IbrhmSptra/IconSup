<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ReportsModel;


class Report extends BaseController
{
    public function create()
    {
        $session = \Config\Services::session();
        $reportmodel = new ReportsModel();
        $payload = [
            'id_user' => user_id(),
            "id_services" => $this->request->getPost('service'),
            "pesan" => $this->request->getPost('pesan'),
        ];
        $reportmodel->insert($payload);
        $session->setFlashdata('success', 'berhasil');
        return redirect()->to('/#report');
    }
}
