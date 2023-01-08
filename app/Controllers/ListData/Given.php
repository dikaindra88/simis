<?php

namespace App\Controllers\ListData;

use App\Controllers\BaseController;
use App\Models\GivenModel;
use App\Models\UsersModel;

class Given extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Given = new GivenModel();;
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
        $data = [
            'title' => 'Page | List Given To',
            'given' => $this->Given->getData(),
            'user' => $this->User->getData()
        ];
        //dd($data);
        return view('givento/V_givento', $data);
    }else{
        return redirect()->to('/');
    }
    }
    public function insert()
    {

        $data = [

            'name' => $this->request->getPost('name'),
            'nip' => $this->request->getPost('nip')

        ];


        $this->Given->insertAcreg($data);

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/Givento');
    }
    public function update($id_given_to)
    {
        $data = [
            'title' => 'Page Update | List Given To',
            'given' => $this->Given->getDetail($id_given_to),
            'user' => $this->User->getData()

        ];
        //dd($data);
        return view('givento/V_update_gt', $data);
    }
    public function EditAction($id_given_to)
    {
        $data = [
            'id_given_to' => $id_given_to,
            'name' => $this->request->getPost('name'),
            'nip' => $this->request->getPost('nip')
        ];


        $this->Given->editData($data);


        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/Givento');
    }
    public function deleteData($id_given_to)
    {

        $this->Given->deleteAcreg($id_given_to);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/Givento');
    }
}
