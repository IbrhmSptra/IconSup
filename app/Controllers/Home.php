<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        if (in_groups('Admin')) {
            $data = [
                'title' => 'IconSup'
            ];
            return view('/admin/content/home', $data);
        } else {
            $data = [
                'title' => 'IconSup'
            ];
            return view('/user/content/home', $data);
        }
    }
}
