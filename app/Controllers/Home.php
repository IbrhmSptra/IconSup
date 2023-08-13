<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServicesModel;
use App\Models\ReportsModel;

class Home extends BaseController
{
    public function index(): string
    {
        //---------------------------------------
        //             HOME FOR ADMIN
        //---------------------------------------
        if (in_groups('Admin')) {
            //model untuk data notif
            $reportsModel = new ReportsModel();
            //data untuk notif report pada topbar
            $notifreports = $reportsModel->reportnotif();


            //data mengisi data dashboard
            $dashboard = $reportsModel->dashboardModel();

            $data = [
                'title' => 'IconSup',
                'totalnotif' => $notifreports['totalData'],
                'notif' => $notifreports['data'],
                'linechart' => $dashboard['linechartdata'],
                'totalreports' => $dashboard['totalreports'],
                'totalsolved' => $dashboard['totalsolved'],
                'totaldeclined' => $dashboard['totaldeclined'],
                'totalpending' => $dashboard['totalpending'],
                'piechart' => $dashboard['piechartdata'],
                'barchart' => $dashboard['barchartdata']
            ];
            return view('/admin/content/home', $data);
        }
        //---------------------------------------
        //             HOME FOR USER
        //---------------------------------------
        else {
            $servicesmodel = new ServicesModel();
            $services = $servicesmodel->findAll();
            $data = [
                'title' => 'IconSup',
                'services' => $services,
            ];
            return view('/user/content/home', $data);
        }
    }
}
