<?php

namespace App\Controllers\ListData;

use App\Controllers\BaseController;
use App\Models\AcregModel;
use App\Models\UsersModel;

class Acreg extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Acreg = new AcregModel();;
        helper('form');
    }
    public function index()
    {
        
            if (session()->get('name') == True) {
        $data = [
            'title' => 'Page | List A / C Registration',
            'acreg' => $this->Acreg->getData(),
            'user' => $this->User->getData()
        ];
        return view('acreg/V_acreg', $data);
    }else{
        return redirect()->to('/');
    }
}
    
    public function insert()
    {

        $data = [

            'acreg_name' => $this->request->getPost('acreg_name')

        ];


        $this->Acreg->insertAcreg($data);

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/Acregist');
    }
    public function update($id_acreg)
    {
        $data = [
            'title' => 'Page Update | List A / C Registration',
            'acreg' => $this->Acreg->getDetail($id_acreg),
            'user' => $this->User->getData()

        ];
        //dd($data);
        return view('acreg/V_update_ac', $data);
    }
    public function EditAction($id_acreg)
    {
        $data = [
            'id_acreg' => $id_acreg,
            'acreg_name' => $this->request->getPost('acreg_name')
        ];


        $this->Acreg->editData($data);


        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/Acregist');
    }
    public function deleteData($id_acreg)
    {

        $this->Acreg->deleteAcreg($id_acreg);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/Acregist');
    }
}
