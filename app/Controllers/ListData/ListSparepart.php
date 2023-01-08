<?php

namespace App\Controllers\ListData;

use App\Controllers\BaseController;
use App\Models\SparepartModel;
use App\Models\Spareparts;
use App\Models\UsersModel;

class ListSparepart extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Sparepart = new SparepartModel();
        $this->Spareparts = new Spareparts();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
        $data = [
            'title' => 'Page | List Spareparts',
            'sparepart' => $this->Spareparts->getDatas(),
            'user' => $this->User->getData()
        ];
        return view('list/V_list', $data);
    }else{
        return redirect()->to('/');
    }
    }
    public function insert()
    {
        $stock = 0;
        $data = [

            'kd_sparepart' => $this->request->getPost('kd_sparepart'),
            'description' => $this->request->getPost('description'),
            'stock' => $stock
        ];


        $this->Spareparts->insertSparepart($data);

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/Sparepart');
    }
    public function update($id_sparepart)
    {
        $data = [
            'title' => 'Page Update | List Spareparts',
            'in' => $this->Spareparts->getDetails($id_sparepart),
            'user' => $this->User->getData()
        ];
        //dd($data);
        return view('list/V_update_list', $data);
    }
    public function EditAction($id_sparepart)
    {
        $data = [
            'id_sparepart' => $id_sparepart,
            'kd_sparepart' => $this->request->getPost('kd_sparepart'),
            'description' => $this->request->getPost('description')
        ];


        $this->Spareparts->editSparepart($data);


        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/Sparepart');
    }
    public function deleteData($id_sparepart)
    {

        $this->Spareparts->deleteSpareparts($id_sparepart);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/Sparepart');
    }
}
