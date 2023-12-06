<?php

namespace App\Controllers\ListData;

use App\Controllers\BaseController;
use App\Models\OumModel;
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
        $this->Oum = new OumModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | List Spareparts',
                'sparepart' => $this->Spareparts->getDatas(),
                'user' => $this->User->getData(),
                'oum' => $this->Oum->getData()
            ];
            return view('list/V_list', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function insert()
    {
        $stock = 0;
        $data = [

            'kd_barang' => $this->request->getPost('kd_barang'),
            'nm_barang' => $this->request->getPost('nm_barang'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'stock' => $stock
        ];


        $this->Spareparts->insertSparepart($data);

        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan.');
        //dd($data);
        return redirect()->to('/Sparepart');
    }
    public function update($id_barang)
    {
        $data = [
            'title' => 'Page Update | List Spareparts',
            'in' => $this->Spareparts->getDetails($id_barang),
            'user' => $this->User->getData(),
            'oum' => $this->Oum->getData()
        ];
        //dd($data);
        return view('list/V_update_list', $data);
    }
    public function EditAction($id_barang)
    {
        $data = [
            'id_barang' => $id_barang,
            'kd_barang' => $this->request->getPost('kd_barang'),
            'nm_barang' => $this->request->getPost('nm_barang'),
            'id_satuan' => $this->request->getPost('id_satuan')
        ];


        $this->Spareparts->editSparepart($data);


        session()->setFlashdata('pesan', 'Data Berhasil Di Ubah.');
        return redirect()->to('/Sparepart');
    }
    public function deleteData($id_sparepart)
    {

        $this->Spareparts->deleteSpareparts($id_sparepart);
        session()->setFlashdata('pesan', 'Data Berhasil Di Ubah.');
        return redirect()->to('/Sparepart');
    }
}
