<?php

namespace App\Controllers\Admin;

use App\Models\ReportsModel;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class Service extends BaseController
{
    public function index()
    {
        // --------------------------  Notif Reports Topbar --------------------------------------
        $reportsModel = new ReportsModel();
        $notifreports = $reportsModel->reportnotif();
        // ---------------------------------------------------------------------------------------


        //Service tables model
        $servicemodel = new ServiceModel();

        $perPage = 20;
        //dapatkan var get dari page untuk penomoran table didalam pagination
        $currentpage = $this->request->getVar('page') ? $this->request->getVar('page') : 1; //klo page ada angkanya maka isi dengan angka tersebut klo ga ada berarti pagenya 1

        //search logic
        $keyword = $this->request->getVar('search');
        if ($keyword) {
            $service = $servicemodel->serviceSearch($perPage, $keyword);
        } else {
            $service = $servicemodel->service($perPage);
        }

        $data = [
            'totalnotif' => $notifreports['totalData'],
            'notif' => $notifreports['data'],
            //------------------------------------------
            'service' => $service['data'],

            'pager' => $service['pager'],
            'currentpage' => $currentpage,
            'totalservice' => $service['totalData']
        ];
        return view("/admin/content/service", $data);
    }

    public function serviceedit($id)
    {
        // --------------------------  Notif Reports Topbar --------------------------------------
        $reportsModel = new ReportsModel();
        $notifreports = $reportsModel->reportnotif();
        // ---------------------------------------------------------------------------------------
        //Service tables model
        $servicemodel = new ServiceModel();
        $service = $servicemodel->find($id);

        $data = [
            'totalnotif' => $notifreports['totalData'],
            'notif' => $notifreports['data'],
            //------------------------------------------
            'service' => $service,
            "header" => "Edit Service",
            "id" => $id
        ];
        return view("/admin/content/serviceEditadd", $data);
    }

    public function servicecreate()
    {
        // --------------------------  Notif Reports Topbar --------------------------------------
        $reportsModel = new ReportsModel();
        $notifreports = $reportsModel->reportnotif();
        // ---------------------------------------------------------------------------------------
        $data = [
            'totalnotif' => $notifreports['totalData'],
            'notif' => $notifreports['data'],
            //------------------------------------------

            "header" => "Create New Service"
        ];
        return view("/admin/content/serviceEditadd", $data);
    }

    public function create()
    {
        $session = \Config\Services::session();
        $servicemodel = new ServiceModel();
        $payload = [
            "name" => $this->request->getPost('servicename'),
        ];


        $servicemodel->insert($payload);
        $session->setFlashdata("create", "berhasil");
        return redirect()->to('/service');
    }

    public function update($id)
    {
        $session = \Config\Services::session();
        $servicemodel = new ServiceModel();

        $payload = [
            "name" => $this->request->getPost('servicename'),
        ];
        $servicemodel->update($id, $payload);
        $session->setFlashdata("update", "berhasil");
        return redirect()->to('/service');
    }

    public function delete($id)
    {
        $session = \Config\Services::session();
        $servicemodel = new ServiceModel();

        $servicemodel->delete($id);
        $session->setFlashdata("delete", "berhasil");
        return redirect()->to('/service');
    }
}
