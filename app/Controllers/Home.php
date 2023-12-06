<?php

namespace App\Controllers;

use App\Models\DepartModel;
use App\Models\GivenModel;
use App\Models\OumModel;
use App\Models\RequestModel;
use App\Models\SparepartModel;
use App\Models\SparepartOutModel;
use App\Models\Spareparts;
use App\Models\UsersModel;
use CodeIgniter\Session\Session;

class Home extends BaseController
{
    public function __construct()
    {
        $this->SparepartsOut = new SparepartOutModel();
        $this->Sparepart = new SparepartModel();
        $this->Spareparts = new Spareparts();
        $this->User = new UsersModel();
        $this->Given = new GivenModel();
        $this->Req = new RequestModel();
        $this->Oum = new OumModel();
        $this->Depart = new DepartModel();
        helper('form');
    }
    //Page Login
    public function index()
    {
        // if (session() == True) {
        //     return redirect()->to('/Dashboard');
        // } else {
        $data = [
            'title' => 'Page | Login',
            'subtitle' => 'Login Admin',
            'validation' => \Config\Services::validation(),
        ];

        return view('V_login', $data);
        // }
    }

    public function personnel()
    {
        // if (session() == True) {
        //     return redirect()->to('/Dashboard');
        // } else {
        $data = [
            'title' => 'Page | Login Personnel',
            'subtitle' => 'Login Personnel',
            'validation' => \Config\Services::validation(),
        ];

        return view('V_login_personnel', $data);
        // }
    }

    //Page Dashboard
    public function dashboard()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Dashboard',
                'sparepart' => $this->Spareparts->countSparepart(),
                'sparepartout' => $this->SparepartsOut->countSparepartOut(),
                'sparepartin' => $this->Sparepart->countSparepartIn(),
                'person' => $this->Given->countPersonnel(),
                'users' => $this->User->countUser(),
                'user' => $this->User->getData(),
            ];
            return view('V_dashboard', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function dashboard_personnel()
    {
        $id_depart = 1;
        $id_depart2 = 2;
        if (session()->get('nama_personnel') == True) {
            if (session('id_depart') == 1) {
                $data = [
                    'title' => 'Page | Dashboard personnel',
                    'request' => $this->Req->getData2(),
                    'person' => $this->Depart->getData(),
                    'users' => $this->Given->getData(),
                    'sparepart' => $this->Spareparts->getDatas(),
                    'oum' => $this->Oum->getData()
                ];
            }
            if (session('id_depart') == 2) {
                $data = [
                    'title' => 'Page | Dashboard personnel',
                    'request' => $this->Req->getData3(),
                    'person' => $this->Given->getData(),
                    'users' => $this->Given->getData(),
                    'sparepart' => $this->Spareparts->getDatas(),
                    'oum' => $this->Oum->getData()
                ];
            }
            if (session()->get('id_depart') == 3) {
                $data = [
                    'title' => 'Page | Dashboard personnel',
                    'request' => $this->Req->getData4(),
                    'person' => $this->Depart->getData(),
                    'users' => $this->Given->getData(),
                    'sparepart' => $this->Spareparts->getDatas(),
                    'oum' => $this->Oum->getData()
                ];
            }
            //dd($data);
            return view('personnel/V_home', $data);
        } else {
            return redirect()->to('/Login-personnel');
        }
    }
}
