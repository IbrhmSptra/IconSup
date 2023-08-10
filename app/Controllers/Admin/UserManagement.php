<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\GroupModel as ModelsGroupModel;
use Myth\Auth\Models\UserModel;
use App\Models\ReportsModel;

class UserManagement extends BaseController
{
    public function index()
    {
        //model untuk data notif
        $reportsModel = new ReportsModel();
        //data untuk notif report pada topbar
        $notifreports = $reportsModel->reportnotif();

        //get User with model myth/auth
        $usermodel = new UserModel();
        //pagination
        $perPage = 10;
        //dapatkan var get dari page untuk penomoran table didalam pagination
        $currentpage = $this->request->getVar('page') ? $this->request->getVar('page') : 1; //klo page ada angkanya maka isi dengan angka tersebut klo ga ada berarti pagenya 1
        //search logic
        $keyword = $this->request->getVar('search');
        if ($keyword) {
            $userData = $usermodel->getuserSearch($perPage, $keyword);
        } else {
            $userData = $usermodel->getuser($perPage);
        }
        $data = [
            'akun' => $userData['data'],
            'pager' => $userData['pager'],
            'currentpage' => $currentpage,
            'totalAkun' => $userData['totalData'],
            'totalnotif' => $notifreports['totalData'],
            'notif' => $notifreports['data'],
        ];

        return view('/admin/content/usermanage', $data);
    }

    public function promote($id = null)
    {
        $session = \Config\Services::session();
        //get model myth/auth
        $GroupModel = new ModelsGroupModel();
        $GroupModel->removeUserFromAllGroups($id);
        $GroupModel->addUserToGroup($id, 1);
        $session->setFlashdata('promote', 'berhasil');
        return redirect()->to('/usermanagement');
    }

    public function delete($id = null)
    {
        $session = \Config\Services::session();
        //get model from myth/auth
        $UserModel = new UserModel();
        $UserModel->delete($id);
        $session->setFlashdata('delete', 'berhasil');
        return redirect()->to('/usermanagement');
    }
}
