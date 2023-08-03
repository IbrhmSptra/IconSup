<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'IconSup-About'
        ];
        return view('/user/content/about', $data);
    }
}
