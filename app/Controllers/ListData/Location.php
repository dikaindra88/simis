<?php

namespace App\Controllers\ListData;

use App\Controllers\BaseController;
use App\Models\LocationModel;
use App\Models\UsersModel;

class Location extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Location = new LocationModel();;
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | List Location',
                'location' => $this->Location->getData(),
                'user' => $this->User->getData()
            ];
            return view('location/V_location', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function insert()
    {

        $data = [

            'nama_rak' => $this->request->getPost('nama_rak')

        ];


        $this->Location->insertLocation($data);

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/Location');
    }
    public function update($id_rak)
    {
        $data = [
            'title' => 'Page Update | List Location',
            'loc' => $this->Location->getDetail($id_rak),
            'user' => $this->User->getData()

        ];
        //dd($data);
        return view('location/V_update_loc', $data);
    }
    public function EditAction($id_rak)
    {
        $data = [
            'id_rak' => $id_rak,
            'nama_rak' => $this->request->getPost('nama_rak')
        ];


        $this->Location->editData($data);


        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/Location');
    }
    public function deleteData($id_location)
    {

        $this->Location->deleteLocation($id_location);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/Location');
    }
}
