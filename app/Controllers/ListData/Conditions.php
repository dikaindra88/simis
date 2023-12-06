<?php

namespace App\Controllers\ListData;

use App\Controllers\BaseController;
use App\Models\ConditionModel;
use App\Models\UsersModel;

class Conditions extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Condition = new ConditionModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | List Condition',
                'condition' => $this->Condition->getData(),
                'user' => $this->User->getData()
            ];
            return view('condition/V_condition', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function insert()
    {

        $data = [

            'kondisi' => $this->request->getPost('kondisi')

        ];


        $this->Condition->insertCondition($data);

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/Conditions');
    }
    public function update($id_kondisi)
    {
        $data = [
            'title' => 'Page Update | List Condition',
            'condition' => $this->Condition->getDetail($id_kondisi),
            'user' => $this->User->getData()

        ];
        //dd($data);
        return view('condition/V_update_con', $data);
    }
    public function EditAction($id_kondisi)
    {
        $data = [
            'id_kondisi' => $id_kondisi,
            'kondisi' => $this->request->getPost('kondisi')
        ];


        $this->Condition->editData($data);


        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/Conditions');
    }
    public function deleteData($id_kondisi)
    {

        $this->Condition->deleteCondition($id_kondisi);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/Conditions');
    }
}
