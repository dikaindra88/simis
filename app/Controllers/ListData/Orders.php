<?php

namespace App\Controllers\ListData;

use App\Controllers\BaseController;
use App\Models\OrdersModel;
use App\Models\UsersModel;

class Orders extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Order = new OrdersModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
        $data = [
            'title' => 'Page | List PO / RO',
            'order' => $this->Order->getData(),
            'user' => $this->User->getData()
        ];
        return view('order/V_order', $data);
    }else{
        return redirect()->to('/');
    }
    }
    public function insert()
    {

        $data = [

            'order_name' => $this->request->getPost('order_name')

        ];


        $this->Order->insertOrder($data);

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/Orders');
    }
    public function update($id_pro)
    {
        $data = [
            'title' => 'Page Update | List PO / RO',
            'order' => $this->Order->getDetail($id_pro),
            'user' => $this->User->getData()

        ];
        //dd($data);
        return view('order/V_update_pro', $data);
    }
    public function EditAction($id_pro)
    {
        $data = [
            'id_pro' => $id_pro,
            'order_name' => $this->request->getPost('order_name')
        ];


        $this->Order->editData($data);


        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/Orders');
    }
    public function deleteData($id_pro)
    {

        $this->Order->deleteOrder($id_pro);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/Orders');
    }
}
