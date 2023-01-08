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
    }else{
        return redirect()->to('/');
    }
    }
    public function insert()
    {

        $data = [

            'location_name' => $this->request->getPost('location_name')

        ];


        $this->Location->insertLocation($data);

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/Location');
    }
    public function update($id_location)
    {
        $data = [
            'title' => 'Page Update | List Location',
            'loc' => $this->Location->getDetail($id_location),
            'user' => $this->User->getData()

        ];
        //dd($data);
        return view('location/V_update_loc', $data);
    }
    public function EditAction($id_location)
    {
        $data = [
            'id_location' => $id_location,
            'location_name' => $this->request->getPost('location_name')
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