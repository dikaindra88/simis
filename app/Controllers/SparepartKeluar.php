<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\SparepartOutModel;
use App\Models\ConditionModel;
use App\Models\LocationModel;
use App\Models\GivenModel;
use App\Models\Spareparts;
use App\Models\UsersModel;
use App\Models\OumModel;

class SparepartKeluar extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Condition = new ConditionModel();
        $this->Location = new LocationModel();
        $this->Given = new GivenModel();
        $this->Sparepart = new Spareparts();
        $this->Oum = new OumModel();
        $this->Spareparts = new SparepartOutModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
        $data = [
            'title' => 'Page | Sparepart Outgoing',
            'out' => $this->Spareparts->getData(),
            'sparepart' => $this->Sparepart->getDatas(),
            'condition' => $this->Condition->getData(),
            'location' => $this->Location->getData(),
            'given' => $this->Given->getData(),
            'user' => $this->User->getData(),
            'oum' => $this->Oum->getData()
        ];
        //dd($data);
        return view('sparepart_keluar/V_data_out', $data);
    }else{
        return redirect()->to('/');
    }
    }
    public function insert()
    {
        $data = [
            'part_number' => $this->request->getPost('part_number'),
            'kd_sparepart' => $this->request->getPost('kd_sparepart'),
            'serial_number' => $this->request->getPost('serial_number'),
            'qty_out' => $this->request->getPost('qty_out'),
            'id_oum' => $this->request->getPost('id_oum'),
            'date_out' => $this->request->getPost('date_out'),
            'reason_out' => $this->request->getPost('reason_out'),
            'id_condition' => $this->request->getPost('id_condition'),
            'id_given_to' => $this->request->getPost('id_given_to')
        ];


        $this->Spareparts->dataKeluar($data);

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/Data-out');
    }
    public function getDetail($id_partout)
    {
        $data = [
            'title' => 'Page Detail | Sparepart Outgoing',
            'out' => $this->Spareparts->getData($id_partout),
            'sparepart' => $this->Sparepart->getDatas(),
            'condition' => $this->Condition->getData(),
            'location' => $this->Location->getData(),
            'given' => $this->Given->getData(),
            'user' => $this->User->getData(),
            'oum' => $this->Oum->getData()
        ];

        return view('sparepart_keluar/V_detail_out', $data);
    }
    public function update($id_partout)
    {
        $data = [
            'title' => 'Page Update | Sparepart Outgoing',
            'out' => $this->Spareparts->getData($id_partout),
            'sparepart' => $this->Sparepart->getDatas(),
            'condition' => $this->Condition->getData(),
            'location' => $this->Location->getData(),
            'given' => $this->Given->getData(),
            'user' => $this->User->getData(),
            'oum' => $this->Oum->getData()
        ];
        //dd($data);
        return view('sparepart_keluar/V_Update_out', $data);
    }
    public function EditAction($id_partout)
    {
        $data = [
            'id_partout' => $id_partout,
            'part_number' => $this->request->getPost('part_number'),
            'kd_sparepart' => $this->request->getPost('kd_sparepart'),
            'serial_number' => $this->request->getPost('serial_number'),
            'qty_out' => $this->request->getPost('qty_out'),
            'id_oum' => $this->request->getPost('id_oum'),
            'date_out' => $this->request->getPost('date_out'),
            'reason_out' => $this->request->getPost('reason_out'),
            'id_condition' => $this->request->getPost('id_condition'),
            'id_given_to' => $this->request->getPost('id_given_to')
        ];


        $this->Spareparts->editData($data);


        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/Data-out');
    }
    public function deleteData($id_partout)
    {

        $this->Spareparts->deleteSparepart($id_partout);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/Data-out');
    }
}
