<?php

namespace App\Controllers;
use App\Models\SparepartModel;
use App\Models\SparepartOutModel;
use App\Models\Spareparts;
use App\Models\UsersModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->SparepartsOut = new SparepartOutModel();
        $this->Sparepart = new SparepartModel();
        $this->Spareparts = new Spareparts();
        $this->User = new UsersModel();
       
        helper('form');
    }
    //Page Login
    public function index()
    {
        $data = [
            'title' => 'Page | Login',
            'subtitle' => 'Login Admin',
            'validation' => \Config\Services::validation(),
        ];

        return view('V_login', $data);
    }

    //Page Dashboard
    public function dashboard(){
        if (session()->get('name') == True) {
$data =[
    'title' => 'Page | Dashboard',
    'sparepart' => $this->Spareparts->countSparepart(),
    'sparepartout' => $this->SparepartsOut->countSparepartOut(),
    'sparepartin' => $this->Sparepart->countSparepartIn(),
    'users' => $this->User->countUser(),
    'user' => $this->User->getData()
];
        return view('V_dashboard', $data);
}else{
    return redirect()->to('/');
}
    }
}
