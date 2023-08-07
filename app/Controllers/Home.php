<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServicesModel;

class Home extends BaseController
{
    public function index(): string
    {
        if (in_groups('Admin')) {
            $data = [
                'title' => 'IconSup'
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
