<?php

namespace App\Controllers\ListData;

use App\Controllers\BaseController;
use App\Models\DepartModel;
use App\Models\GivenModel;
use App\Models\UsersModel;

class Given extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Given = new GivenModel();;
        $this->Depart = new DepartModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | List Given To',
                'given' => $this->Given->getData(),
                'user' => $this->User->getData(),
                'person' => $this->Depart->getData()
            ];
            //dd($data);
            return view('givento/V_givento', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function insert()
    {

        $data = [

            'nama_personnel' => $this->request->getPost('nama_personnel'),
            'nip_personnel' => $this->request->getPost('nip_personnel'),
            'id_depart' => $this->request->getPost('id_depart'),
            'status' => 'personnel'

        ];


        $this->Given->insertAcreg($data);

        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan.');
        //dd($data);
        return redirect()->to('/Givento');
    }
    public function update($id_personnel)
    {
        $data = [
            'title' => 'Page Update | List Given To',
            'given' => $this->Given->getDetail($id_personnel),
            'user' => $this->User->getData(),
            'person' => $this->Depart->getData()

        ];
        //dd($data);
        return view('givento/V_update_gt', $data);
    }
    public function EditAction($id_personnel)
    {
        $data = [
            'id_personnel' => $id_personnel,
            'nama_personnel' => $this->request->getPost('nama_personnel'),
            'nip_personnel' => $this->request->getPost('nip_personnel'),
            'id_depart' => $this->request->getPost('id_depart')
        ];


        $this->Given->editData($data);


        session()->setFlashdata('pesan', 'Data Berhasil Di Ubah.');
        return redirect()->to('/Givento');
    }
    public function deleteData($id_personnel)
    {

        $this->Given->deleteAcreg($id_personnel);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus.');
        return redirect()->to('/Givento');
    }
}
