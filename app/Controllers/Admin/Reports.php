<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReportsModel;

class Reports extends BaseController
{

    //------------------------------------- show pending reports from notification when admin click ---------------------------------------------------
    public function reportsNotif($id = null)
    {
        //Notif Reports Top Bar ==========
        $reportsModel = new ReportsModel();
        //data untuk notif report pada topbar
        $notifreports = $reportsModel->reportnotif();


        //reports pending select where id notif=============
        $reportsData = $reportsModel->reportpendingNotif($id);

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


    // ------------------------------------------------- Show reports pending --------------------------------------------------
    public function reportsPending()
    {
        // --------------------------  Notif Reports Topbar --------------------------------------
        $reportsModel = new ReportsModel();
        $notifreports = $reportsModel->reportnotif();
        // ---------------------------------------------------------------------------------------

        //pagination
        $perPage = 20;
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
            'totalnotif' => $notifreports['totalData'],
            "notif" => $notifreports['data'],
            //------------------------------------

            'reports' => $reportData['data'],
            'pager' => $reportData['pager'],
            'currentpage' => $currentpage,
            'totalReports' => $reportData['totalData'],

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
        // --------------------------  Notif Reports Topbar --------------------------------------
        $reportsModel = new ReportsModel();
        $notifreports = $reportsModel->reportnotif();
        // ---------------------------------------------------------------------------------------

        //pagination
        $perPage = 20;
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
        // --------------------------  Notif Reports Topbar --------------------------------------
        $reportsModel = new ReportsModel();
        $notifreports = $reportsModel->reportnotif();
        //----------------------------------------------------------------------------------------


        //pagination
        $perPage = 20;
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
