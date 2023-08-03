<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class History extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'IconSup-History'
        ];
        return view('/user/content/history', $data);
    }
}
