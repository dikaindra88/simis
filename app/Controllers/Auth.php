<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GivenModel;
use App\Models\UsersModel;
use CodeIgniter\Validation\StrictRules\Rules;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->UsersModel = new UsersModel();
        $this->Person = new GivenModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
            return view('V_login');
        } else {
            return redirect()->to('/Dashboard');
        }
    }
    public function cek_login()
    {
        $validate = $this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} must be insert !!',
                    'valid_email' => 'Harus format email!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} must be insert !!',
                ],
            ]
        ]);
        if (!$validate) {
            return view('V_login', ['validation' => $this->validator]);
        }
        // valid
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $passwordx = md5($password);
        $cek_login = $this->UsersModel->login_user($email, $passwordx);
        if ($cek_login) {
            session()->set('name', $cek_login['name']);
            session()->set('email', $cek_login['email']);
            session()->set('status', $cek_login['status']);
            session()->set('id_user', $cek_login['id_user']);

            return redirect()->to(base_url('/Dashboard'));
        } else {
            session()->setFlashdata('pesan', 'Email atau Password salah..!!!');
            return redirect()->to(base_url('/'));
        }
    }

    public function cek_login1()
    {
        // $validate = $this->validate([
        //     'nip_personnel' => [
        //         'label' => 'nip',
        //         'rules' => 'required|valid_nip',
        //         'errors' => [
        //             'required' => '{field} must be insert !!'
        //         ]
        //     ]
        // ]);
        // if (!$validate) {
        //     return view('V_login_personnel', ['validation' => $this->validator]);
        // }
        // valid
        $nip = $this->request->getPost('nip_personnel');

        $cek_login = $this->Person->login_user($nip);
        if ($cek_login) {
            session()->set('nama_personnel', $cek_login['nama_personnel']);
            session()->set('nip_personnel', $cek_login['nip_personnel']);
            session()->set('id_depart', $cek_login['id_depart']);
            session()->set('id_personnel', $cek_login['id_personnel']);
            session()->set('status', $cek_login['status']);
            //dd($cek_login);
            return redirect()->to(base_url('/Dashboard-personnel'));
        } else {
            session()->setFlashdata('pesan', 'Nip tidak terdaftar!!!');
            return redirect()->to(base_url('/Login-personnel'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->setFlashdata('logout', 'Berhasil Logout');
        return redirect()->to(base_url('/'));
    }
    public function logout2()
    {
        $session = session();
        $session->destroy();
        session()->setFlashdata('logout', 'Berhasil Logout');
        return redirect()->to(base_url('/Login-personnel'));
    }
}
