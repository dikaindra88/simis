<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartModel;
use App\Models\GivenModel;
use App\Models\OumModel;
use App\Models\RequestModel;
use App\Models\Spareparts;
use App\Models\UsersModel;

class Request extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Req = new RequestModel();
        $this->Spareparts = new Spareparts();
        $this->Oum = new OumModel();
        $this->Given = new GivenModel();
        $this->Depart = new DepartModel();
        helper('form');
    }

    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Request Sparepart',
                'request' => $this->Req->getData(),
                'sparepart' => $this->Spareparts->getDatas(),
                'user' => $this->User->getData()
            ];
            //dd($data);
            return view('request/V_request', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function update($id_request)
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page update | Request Sparepart',
                'request' => $this->Req->getDetail($id_request),
                'sparepart' => $this->Spareparts->getDatas(),
                'user' => $this->User->getData(),
            ];
            //dd($data);
            return view('request/V_update', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function editData($id_request)
    {
        $time = date('Y-m-d H:i:s');
        $data = [
            'id_request' => $id_request,
            'approve' => $this->request->getPost('approve'),
            'updated_at' => $time
        ];
        $this->Req->updateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Ubah.');
        return redirect()->to('/Request-sparepart');
    }
    public function insert()
    {
        $data = [
            'tgl_request' => $this->request->getPost('tgl_request'),
            'kd_barang' => $this->request->getPost('kd_barang'),
            'nama' => $this->request->getPost('nama'),
            'nip' => $this->request->getPost('nip'),
            'qty' => $this->request->getPost('qty'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'id_depart' => $this->request->getPost('id_depart'),
            'keperluan' => $this->request->getPost('keperluan'),
            'approve' => 'progress'
        ];

        $this->Req->insertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
        //dd($data);
        return redirect()->to('/Dashboard-personnel');
    }

    public function update2($id_request)
    {
        $data = [
            'title' => 'Page Update | Request Barang / Sparepart',
            'req' => $this->Req->getDetail($id_request),
            'person' => $this->Depart->getData(),
            'users' => $this->Given->getData(),
            'sparepart' => $this->Spareparts->getDatas(),
            'oum' => $this->Oum->getData(),
            'user' => $this->User->getData()
        ];
        //dd($data);
        return view('personnel/V_update', $data);
    }
    public function EditAction($id_request)
    {
        $time = date('Y-m-d H:i:s');
        $data = [
            'id_request' => $id_request,
            'nama' => $this->request->getPost('nama'),
            'nip' => $this->request->getPost('nip'),
            'tgl_request' => $this->request->getPost('tgl_request'),
            'kd_barang' => $this->request->getPost('kd_barang'),
            'id_depart' => $this->request->getPost('id_depart'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'keperluan' => $this->request->getPost('keperluan'),
            'qty' => $this->request->getPost('qty'),
            'updated_at' => $time

        ];
        $this->Req->editData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Ubah.');
        return redirect()->to('/Dashboard-personnel');
    }
}
