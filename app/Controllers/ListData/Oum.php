<?php

namespace App\Controllers\ListData;

use App\Controllers\BaseController;
use App\Models\OumModel;
use App\Models\UsersModel;

class Oum extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Oum = new OumModel();;
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | List OUM',
                'oum' => $this->Oum->getData(),
                'user' => $this->User->getData()
            ];
            return view('oum/V_oum', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function insert()
    {

        $data = [

            'satuan' => $this->request->getPost('satuan')

        ];


        $this->Oum->insertOum($data);

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/Oum');
    }
    public function update($id_oum)
    {
        $data = [
            'title' => 'Page Update | List OUM',
            'oum' => $this->Oum->getDetail($id_oum),
            'user' => $this->User->getData()

        ];
        //dd($data);
        return view('oum/V_update_oum', $data);
    }
    public function EditAction($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan,
            'satuan' => $this->request->getPost('satuan')
        ];
        $this->Oum->editData($data);


        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/Oum');
    }
    public function deleteData($id_satuan)
    {

        $this->Oum->deleteOum($id_satuan);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/Oum');
    }
}
