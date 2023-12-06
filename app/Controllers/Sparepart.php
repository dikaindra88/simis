<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SparepartModel;
use App\Models\Spareparts;
use App\Models\ConditionModel;
use App\Models\LocationModel;
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
        $this->Oum = new OumModel();
        helper('form');
    }

    public function in()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Sparepart Masuk',
                'out' => $this->Sparepart->getData(),
                'sparepart' => $this->Spareparts->getDatas(),
                'condition' => $this->Condition->getData(),
                'location' => $this->Location->getData(),
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
            'title' => 'Page Update | Sparepart Masuk',
            'in' => $this->Sparepart->getDetail($id_partin),
            'sparepart' => $this->Spareparts->getDatas(),
            'condition' => $this->Condition->getData(),
            'location' => $this->Location->getData(),
            'satuan' => $this->Oum->getData(),
            'user' => $this->User->getData(),
        ];
        //dd($data);
        return view('sparepart/V_Update_in', $data);
    }
    public function EditAction($id_masuk)
    {
        $file = $this->request->getFile('document_arc');
        $time = date('Y-m-d H:i:s');
        if ($file->getError() == 4) {
            $data = [
                'id_masuk' => $id_masuk,
                'part_number' => $this->request->getPost('part_number'),
                'kd_barang' => $this->request->getPost('kd_barang'),
                'serial_number' => $this->request->getPost('serial_number'),
                'id_rak' => $this->request->getPost('id_rak'),
                'qty_in' => $this->request->getPost('qty_in'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'tgl_masuk' => $this->request->getPost('tgl_masuk'),
                'arc_form_no' => $this->request->getPost('arc_form_no'),
                'arc_no' => $this->request->getPost('arc_no'),
                'vendor' => $this->request->getPost('vendor'),
                'id_kondisi' => $this->request->getPost('id_kondisi'),
                'remarks' => $this->request->getPost('remarks'),
                'create_date' => $this->request->getPost('create_date'),
                'exp_date' => $this->request->getPost('exp_date'),
                'updated_at' => $time
            ];
            $this->Sparepart->editData($data);
        } else {



            $file = $this->request->getFile('document_arc');
            $nama_file = $file->getName();

            $data = [
                'id_masuk' => $id_masuk,
                'part_number' => $this->request->getPost('part_number'),
                'kd_barang' => $this->request->getPost('kd_barang'),
                'serial_number' => $this->request->getPost('serial_number'),
                'id_rak' => $this->request->getPost('id_rak'),
                'qty_in' => $this->request->getPost('qty_in'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'tgl_masuk' => $this->request->getPost('tgl_masuk'),
                'arc_form_no' => $this->request->getPost('arc_form_no'),
                'arc_no' => $this->request->getPost('arc_no'),
                'vendor' => $this->request->getPost('vendor'),
                'id_kondisi' => $this->request->getPost('id_kondisi'),
                'remarks' => $this->request->getPost('remarks'),
                'create_date' => $this->request->getPost('create_date'),
                'exp_date' => $this->request->getPost('exp_date'),
                'document_arc' => $nama_file,
                'updated_at' => $time
            ];
            // upload file foto
            $file->move('foto/', $nama_file);

            $this->Sparepart->editData($data);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Di Ubah.');
        return redirect()->to('/Data-in');
    }
    public function getDetail($id_partin)
    {
        $data = [
            'title' => 'Page Detail | Sparepart Masuk',
            'in' => $this->Sparepart->getDetail($id_partin),
            'user' => $this->User->getData(),
        ];
        //dd($data);
        return view('sparepart/V_detail_in', $data);
    }

    public function insert()
    {


        $image = $this->request->getFile('document_arc');
        $nama_file = $image->getName();
        if ($image->getError() == 4) {
            $data = [
                'part_number' => $this->request->getPost('part_number'),
                'kd_barang' => $this->request->getPost('kd_barang'),
                'serial_number' => $this->request->getPost('serial_number'),
                'id_rak' => $this->request->getPost('id_rak'),
                'qty_in' => $this->request->getPost('qty_in'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'tgl_masuk' => $this->request->getPost('tgl_masuk'),
                'arc_form_no' => $this->request->getPost('arc_form_no'),
                'arc_no' => $this->request->getPost('arc_no'),
                'vendor' => $this->request->getPost('vendor'),
                'id_kondisi' => $this->request->getPost('id_kondisi'),
                'remarks' => $this->request->getPost('remarks'),
                'create_date' => $this->request->getPost('create_date'),
                'exp_date' => $this->request->getPost('exp_date')
            ];

            $this->Sparepart->insertSparepart($data);
        } else {
            $image = $this->request->getFile('document_arc');
            $nama_file = $image->getName();
            $data = [
                'part_number' => $this->request->getPost('part_number'),
                'kd_barang' => $this->request->getPost('kd_barang'),
                'serial_number' => $this->request->getPost('serial_number'),
                'id_rak' => $this->request->getPost('id_rak'),
                'qty_in' => $this->request->getPost('qty_in'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'tgl_masuk' => $this->request->getPost('tgl_masuk'),
                'arc_form_no' => $this->request->getPost('arc_form_no'),
                'arc_no' => $this->request->getPost('arc_no'),
                'vendor' => $this->request->getPost('vendor'),
                'id_kondisi' => $this->request->getPost('id_kondisi'),
                'remarks' => $this->request->getPost('remarks'),
                'create_date' => $this->request->getPost('create_date'),
                'exp_date' => $this->request->getPost('exp_date'),
                'document_arc' => $nama_file,
            ];

            $image->move('foto/', $nama_file);
            $this->Sparepart->insertSparepart($data);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
        //dd($data);
        return redirect()->to('/Data-in');
    }
    public function deleteData($id_masuk)
    {

        $this->Sparepart->deleteSparepart($id_masuk);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus.');
        return redirect()->to('/Data-in');
    }
}
