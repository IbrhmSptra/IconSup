<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReportsModel;

class Reports extends BaseController
{

    //------------------------------------- Pending Reports ---------------------------------------------------
    public function reportsNotif($id = null)
    {
        $reportsModel = new ReportsModel();
        //reports select where id from notif
        $reportsData = $reportsModel->reportpendingNotif($id);
        //data untuk notif report pada topbar
        $notifreports = $reportsModel->reportnotif();
        $data = [
            'reports' => $reportsData['data'],
            'pager' => "",
            'currentpage' => 1,
            'totalReports' => $notifreports['totalData'],
            'totalnotif' => $notifreports['totalData'],
            'notif' => $notifreports['data'],
        ];
        return view('/admin/content/reportspending', $data);
    }
    public function reportsPending()
    {
        $reportsModel = new ReportsModel();
        //data untuk notif report pada topbar
        $notifreports = $reportsModel->reportnotif();

        //pagination
        $perPage = 10;
        //dapatkan var get dari page untuk penomoran table didalam pagination
        $currentpage = $this->request->getVar('page') ? $this->request->getVar('page') : 1; //klo page ada angkanya maka isi dengan angka tersebut klo ga ada berarti pagenya 1
        //search logic
        $keyword = $this->request->getVar('search');
        if ($keyword) {
            $reportData = $reportsModel->reportpendingSearch($perPage, $keyword);
        } else {
            $reportData = $reportsModel->reportpending($perPage);
        }

        $data = [
            'reports' => $reportData['data'],
            'pager' => $reportData['pager'],
            'currentpage' => $currentpage,
            'totalReports' => $reportData['totalData'],
            'totalnotif' => $notifreports['totalData'],
            "notif" => $notifreports['data'],
        ];

        return view('/admin/content/reportspending', $data);
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



    //------------------------------------- Resolved Reports ---------------------------------------------------
    public function reportsSolved()
    {
        $reportsModel = new ReportsModel();
        //data untuk notif report pada topbar
        $notifreports = $reportsModel->reportnotif();

        //pagination
        $perPage = 10;
        //dapatkan var get dari page untuk penomoran table
        $currentpage = $this->request->getVar('page') ? $this->request->getVar('page') : 1; //klo page ada angkanya maka isi dengan angka tersebut klo ga ada berarti pagenya 1
        //search logic
        $keyword = $this->request->getVar('search');
        if ($keyword) {
            $reportData = $reportsModel->reportsolvedSearch($perPage, $keyword);
        } else {
            $reportData = $reportsModel->reportsolved($perPage);
        }
        $data = [
            'reports' => $reportData['data'],
            'pager' => $reportData['pager'],
            'currentpage' => $currentpage,
            'totalReports' => $reportData['totalData'],
            'totalnotif' => $notifreports['totalData'],
            'notif' => $notifreports['data'],
        ];

        return view('/admin/content/reportssolved', $data);
    }




    //------------------------------------- Declined Reports ---------------------------------------------------
    public function reportsDeclined()
    {
        $reportsModel = new ReportsModel();
        //data untuk notif report pada topbar
        $notifreports = $reportsModel->reportnotif();

        //pagination
        $perPage = 10;
        //dapatkan var get dari page untuk penomoran table
        $currentpage = $this->request->getVar('page') ? $this->request->getVar('page') : 1; //klo page ada angkanya maka isi dengan angka tersebut klo ga ada berarti pagenya 1

        //search logic
        $keyword = $this->request->getVar('search'); //dapatkan variable keyword search dari method post
        if ($keyword) {
            $reportData = $reportsModel->reportdeclinedSearch($perPage, $keyword);
        } else {
            $reportData = $reportsModel->reportdeclined($perPage);
        }

        $data = [
            'reports' => $reportData['data'],
            'pager' => $reportData['pager'],
            'currentpage' => $currentpage,
            'totalReports' => $reportData['totalData'],
            'totalnotif' => $notifreports['totalData'],
            'notif' => $notifreports['data'],
        ];

        return view('/admin/content/reportsdeclined', $data);
    }
}
