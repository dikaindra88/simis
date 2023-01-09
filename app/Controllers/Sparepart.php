<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SparepartModel;
use App\Models\Spareparts;
use App\Models\ConditionModel;
use App\Models\LocationModel;
use App\Models\AcregModel;
use App\Models\OrdersModel;
use App\Models\OumModel;
use App\Models\UsersModel;

class Sparepart extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Sparepart = new SparepartModel();
        $this->Spareparts = new Spareparts();
        $this->Condition = new ConditionModel();
        $this->Location = new LocationModel();
        $this->Acreg = new AcregModel();
        $this->Order = new OrdersModel();
        $this->Oum = new OumModel();
        helper('form');
    }

    public function in()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Sparepart Incoming',
                'out' => $this->Sparepart->getData(),
                'sparepart' => $this->Spareparts->getDatas(),
                'condition' => $this->Condition->getData(),
                'location' => $this->Location->getData(),
                'acreg' => $this->Acreg->getData(),
                'order' => $this->Order->getData(),
                'oum' => $this->Oum->getData(),
                'user' => $this->User->getData(),
            ];
            //dd($data);
            return view('sparepart/V_data_in', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function update($id_partin)
    {
        $data = [
            'title' => 'Page Update | Sparepart Incoming',
            'in' => $this->Sparepart->getDetail($id_partin),
            'sparepart' => $this->Spareparts->getDatas(),
            'condition' => $this->Condition->getData(),
            'location' => $this->Location->getData(),
            'acreg' => $this->Acreg->getData(),
            'order' => $this->Order->getData(),
            'oum' => $this->Oum->getData(),
            'user' => $this->User->getData(),
        ];
        //dd($data);
        return view('sparepart/V_Update_in', $data);
    }
    public function EditAction($id_partin)
    {
        $file = $this->request->getFile('document_arc');
        if ($file->getError() == 4) {
            $data = [
                'id_partin' => $id_partin,
                'kd_sparepart' => $this->request->getPost('kd_sparepart'),
                'part_number' => $this->request->getPost('part_number'),
                'serial_number' => $this->request->getPost('serial_number'),
                'id_location' => $this->request->getPost('id_location'),
                'qty_in' => $this->request->getPost('qty_in'),
                'id_oum' => $this->request->getPost('id_oum'),
                'date_in' => $this->request->getPost('date_in'),
                'id_pro' => $this->request->getPost('id_pro'),
                'arc_form_no' => $this->request->getPost('arc_form_no'),
                'arc_no' => $this->request->getPost('arc_no'),
                'vendors' => $this->request->getPost('vendors'),
                'id_condition' => $this->request->getPost('id_condition'),
                'consumable' => $this->request->getPost('consumable'),
                'awb' => $this->request->getPost('awb'),
                'id_acreg' => $this->request->getPost('id_acreg'),
                'mr_number' => $this->request->getPost('mr_number'),
                'remarks' => $this->request->getPost('remarks'),
                'document' => $this->request->getPost('document'),
                'create_date' => $this->request->getPost('create_date'),
                'expired_date' => $this->request->getPost('expired_date')
            ];
            $this->Sparepart->editData($data);
        } else {



            $file = $this->request->getFile('document_arc');
            $nama_file = $file->getName();
            $data = [
                'id_partin' => $id_partin,
                'kd_sparepart' => $this->request->getPost('kd_sparepart'),
                'part_number' => $this->request->getPost('part_number'),
                'serial_number' => $this->request->getPost('serial_number'),
                'id_location' => $this->request->getPost('id_location'),
                'qty_in' => $this->request->getPost('qty_in'),
                'id_oum' => $this->request->getPost('id_oum'),
                'date_in' => $this->request->getPost('date_in'),
                'id_pro' => $this->request->getPost('id_pro'),
                'arc_form_no' => $this->request->getPost('arc_form_no'),
                'arc_no' => $this->request->getPost('arc_no'),
                'vendors' => $this->request->getPost('vendors'),
                'id_condition' => $this->request->getPost('id_condition'),
                'consumable' => $this->request->getPost('consumable'),
                'awb' => $this->request->getPost('awb'),
                'id_acreg' => $this->request->getPost('id_acreg'),
                'mr_number' => $this->request->getPost('mr_number'),
                'remarks' => $this->request->getPost('remarks'),
                'document' => $this->request->getPost('document'),
                'create_date' => $this->request->getPost('create_date'),
                'expired_date' => $this->request->getPost('expired_date'),
                'document_arc' => $nama_file
            ];
            // upload file foto
            $file->move('foto/', $nama_file);

            $this->Sparepart->editData($data);
        }

        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/Data-in');
    }
    public function getDetail($id_partin)
    {
        $data = [
            'title' => 'Page Detail | Sparepart Incoming',
            'in' => $this->Sparepart->getDetail($id_partin),
            'user' => $this->User->getData(),
        ];

        return view('sparepart/V_detail_in', $data);
    }

    public function insert()
    {


        $image = $this->request->getFile('document_arc');
        $nama_file = $image->getName();
        $data = [
            'part_number' => $this->request->getPost('part_number'),
            'kd_sparepart' => $this->request->getPost('kd_sparepart'),
            'serial_number' => $this->request->getPost('serial_number'),
            'id_location' => $this->request->getPost('id_location'),
            'qty_in' => $this->request->getPost('qty_in'),
            'id_oum' => $this->request->getPost('id_oum'),
            'date_in' => $this->request->getPost('date_in'),
            'id_pro' => $this->request->getPost('id_pro'),
            'arc_form_no' => $this->request->getPost('arc_form_no'),
            'arc_no' => $this->request->getPost('arc_no'),
            'vendors' => $this->request->getPost('vendors'),
            'id_condition' => $this->request->getPost('id_condition'),
            'consumable' => $this->request->getPost('consumable'),
            'awb' => $this->request->getPost('awb'),
            'id_acreg' => $this->request->getPost('id_acreg'),
            'mr_number' => $this->request->getPost('mr_number'),
            'remarks' => $this->request->getPost('remarks'),
            'document' => $this->request->getPost('document'),
            'create_date' => $this->request->getPost('create_date'),
            'expired_date' => $this->request->getPost('expired_date'),
            'document_arc' => $nama_file,


        ];

        $image->move('foto/', $nama_file);
        $this->Sparepart->insertSparepart($data);

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/Data-in');
    }
    public function deleteData($id_partin)
    {

        $this->Sparepart->deleteSparepart($id_partin);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/Data-in');
    }
}
