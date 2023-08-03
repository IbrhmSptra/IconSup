<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'IconSup'
        ];
        return view('/user/content/home', $data);
    }
}
