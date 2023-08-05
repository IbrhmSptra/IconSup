<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class History extends BaseController
{
    public function index()
    {
        if (in_groups('Admin')) {
            $data = [
                'title' => 'IconSup'
            ];
            return view('/admin/content/home', $data);
        } else {
            $data = [
                'title' => 'IconSup-History'
            ];
            return view('/user/content/history', $data);
        }
    }
}
