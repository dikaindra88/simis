<?php

namespace App\Controllers\SpareCondition;

use App\Controllers\BaseController;
use App\Models\SparepartModel;
use \Dompdf\Dompdf;
use \Dompdf\Options;
use App\Models\UsersModel;

class Overhauled extends BaseController
{
    public function __construct()
    {
        $this->Option = new Options();
        $this->User = new UsersModel();
        $this->Over = new SparepartModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
        $data = [
           
            'title' => 'Page | Condition Overhauled',
            'over' => $this->Over->getOverhauled(),
            'user' => $this->User->getData(),
            'first_date'=> '',
            'end_date'=> ''
        ];
        return view('sparecondition/overhauled/V_overhauled', $data);
    }else{
        return redirect()->to('/');
    }
    }
    public function alert()
    {
        if (session()->get('name') == True) {
        return view('inventory/alert');
    }else{
        return redirect()->to('/');
    }
    }
    public function show()
    {
        if (session()->get('name') == True) {
        $first_date = $this->request->getPost('first_date');
        $end_date = $this->request->getPost('end_date');
        $data = [
            'title' => 'Page | Condition Overhauled',
        'over' => $this->Over->getDetailOverhauled($first_date, $end_date),
        'user' => $this->User->getData(),
        'first_date' => $first_date,
        'end_date' => $end_date
        ];
        //dd($data);
        return view('sparecondition/overhauled/V_overhauled', $data);
    }else{
        return redirect()->to('/');
    }
    }
    public function excel($first_date, $end_date, $mid_date, $first_date1, $end_date1, $mid_date1)
    {
        if (session()->get('name') == True) {
        $first = $first_date.'/'. $end_date .'/'. $mid_date;
        $end = $first_date1.'/'. $end_date1 .'/'. $mid_date1;
        $data = [
            'over' => $this->Over->getDetailOverhauled($first, $end),
            'first_date'=> $first,
            'end_date'=> $end

        ];
         //dd($data);
        return view('sparecondition/overhauled/excel', $data);
    }else{
        return redirect()->to('/');
    }
    }
    public function print($first_date, $end_date, $mid_date, $first_date1, $end_date1, $mid_date1)
    {
        if (session()->get('name') == True) {
        $first = $first_date.'/'. $end_date .'/'. $mid_date;
        $end = $first_date1.'/'. $end_date1 .'/'. $mid_date1;
        $data = [
            
            'over' => $this->Over->getDetailOverhauled($first, $end),
           'first_date' => $first_date.'/'. $end_date .'/'. $mid_date,
           'end_date' => $first_date1.'/'. $end_date1 .'/'. $mid_date1,
           
           
        ];
        //dd($data);
       //return 
        $html = view('sparecondition/overhauled/print', $data);
       
        $this->Option->setIsRemoteEnabled(true);
        $this->Option->setIsHtml5ParserEnabled(true);
        
        $op = $this->Option->set('chroot', realpath(''));
        $dompdf = new Dompdf($op);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }else{
        return redirect()->to('/');
    }
}
}
