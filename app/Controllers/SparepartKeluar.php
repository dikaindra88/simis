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
        } else {
            return redirect()->to('/');
        }
    }
    public function insert()
    {
        $data = [
            'part_number' => $this->request->getPost('part_number'),
            'kd_barang' => $this->request->getPost('kd_barang'),
            'serial_number' => $this->request->getPost('serial_number'),
            'qty_out' => $this->request->getPost('qty_out'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'tgl_keluar' => $this->request->getPost('tgl_keluar'),
            'keterangan' => $this->request->getPost('keterangan'),
            'id_kondisi' => $this->request->getPost('id_kondisi'),
            'id_personnel' => $this->request->getPost('id_personnel')
        ];


        $this->Spareparts->dataKeluar($data);

        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
        //dd($data);
        return redirect()->to('/Data-out');
    }
    public function getDetail($id_keluar)
    {
        $data = [
            'title' => 'Page Detail | Sparepart Outgoing',
            'out' => $this->Spareparts->getData($id_keluar),
            'sparepart' => $this->Sparepart->getDatas(),
            'condition' => $this->Condition->getData(),
            'location' => $this->Location->getData(),
            'given' => $this->Given->getData(),
            'user' => $this->User->getData(),
            'oum' => $this->Oum->getData()
        ];

        return view('sparepart_keluar/V_detail_out', $data);
    }
    public function update($id_keluar)
    {
        $data = [
            'title' => 'Page Update | Sparepart Outgoing',
            'out' => $this->Spareparts->getData2($id_keluar),
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
    public function EditAction($id_keluar)
    {
        $time = date('Y-m-d H:i:s');
        $data = [
            'id_keluar' => $id_keluar,
            'part_number' => $this->request->getPost('part_number'),
            'kd_barang' => $this->request->getPost('kd_barang'),
            'serial_number' => $this->request->getPost('serial_number'),
            'qty_out' => $this->request->getPost('qty_out'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'tgl_keluar' => $this->request->getPost('tgl_keluar'),
            'keterangan' => $this->request->getPost('keterangan'),
            'id_kondisi' => $this->request->getPost('id_kondisi'),
            'id_personnel' => $this->request->getPost('id_personnel'),
            'updated_at' => $time
        ];
        $this->Spareparts->editData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Ubah.');
        return redirect()->to('/Data-out');
    }
    public function deleteData($id_keluar)
    {
        $this->Spareparts->deleteSparepart($id_keluar);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus.');
        return redirect()->to('/Data-out');
    }
}
