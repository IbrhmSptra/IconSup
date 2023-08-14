<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        if (logged_in()) {
            // Pengguna sudah login
            if (in_groups('User')) {
                $data = [
                    'title' => 'IconSup-About'
                ];
                return view('/user/content/about', $data);
            } else {
                //berarti dia admin
                return redirect()->to('/');
            }
        } else {
            $data = [
                'title' => 'IconSup-About'
            ];
            return view('/user/content/about', $data);
        }
    }
}
