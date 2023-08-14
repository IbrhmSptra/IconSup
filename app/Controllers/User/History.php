<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ReportsModel;

class History extends BaseController
{
    public function index()
    {
        //ketika dia login melalui navbar history dan masuk sebagai admin
        if (in_groups('Admin')) {
            return redirect()->to('/');
        }
        // dia login sebagai user
        else {

            //pagination
            $perPage = 5;
            //panggil model dan function untuk history
            $reportsModel = new ReportsModel();
            $historydata = $reportsModel->history($perPage, user_id());

            $data = [
                'title' => 'IconSup-History',
                'history' => $historydata['data'],
                'pager' => $historydata['pager'],
                'totalHistory' => $historydata['totalData'],
            ];
            return view('/user/content/history', $data);
        }
    }
}
