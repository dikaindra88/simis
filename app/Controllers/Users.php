<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Users extends BaseController
{
    public function __construct()
    {

        $this->Users = new UsersModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Users',
                'users' => $this->Users->getData(),
                'user' => $this->Users->getData()
            ];
            return view('admin/V_admin', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function insert()
    {
        $image = $this->request->getFile('foto');
        $nama_file = $image->getName();
        $password = $this->request->getPost('password');
        $passx = md5($password);
        $data = [

            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $passx,
            'status' => $this->request->getPost('status'),
            'foto' => $nama_file

        ];
        $image->move('img/', $nama_file);
        $this->Users->insertUsers($data);

        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
        //dd($data);
        return redirect()->to('/Users');
    }
    public function update($id_user)
    {
        $data = [
            'title' => 'Page Update | Users',
            'users' => $this->Users->getDetail($id_user),
            'user' => $this->Users->getData()

        ];
        //dd($data);
        return view('admin/V_update', $data);
    }
    public function EditAction($id_user)
    {

        $file = $this->request->getFile('foto');
        $password = $this->request->getPost('password');
        $passx = md5($password);
        if ($file->getError() == 4) {
            $data = [
                'id_user' => $id_user,
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => $passx,
            ];
            $this->Users->editData($data);
        } else {
            $file = $this->request->getFile('foto');
            $nama_file = $file->getName();
            $data = [
                'id_user' => $id_user,
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => $passx,
                'foto' => $nama_file
            ];
            // upload file foto
            $file->move('img/', $nama_file);
            $this->Users->editData($data);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Di Ubah.');
        return redirect()->to('/Users');
    }
    public function deleteData($id_user)
    {

        $this->Users->deleteUsers($id_user);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus.');
        return redirect()->to('/Users');
    }
}
