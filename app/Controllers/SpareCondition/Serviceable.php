<?php

namespace App\Controllers\SpareCondition;

use App\Controllers\BaseController;
use App\Models\SparepartModel;
use App\Models\ConditionModel;
use \Dompdf\Dompdf;
use \Dompdf\Options;
use App\Models\UsersModel;

class Serviceable extends BaseController
{
    public function __construct()
    {
        $this->Option = new Options();
        $this->Condition = new ConditionModel();
        $this->Serviceable = new SparepartModel();
        $this->User = new UsersModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Condition Serviceable',
                'serviceable' => $this->Serviceable->getServiceable(),
                'condition' => $this->Condition->getData(),
                'user' => $this->User->getData(),
                'first_date' => '',
                'end_date' => ''
            ];
            return view('sparecondition/serviceable/V_serviceable', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function alert()
    {
        if (session()->get('name') == True) {
            return view('inventory/alert');
        } else {
            return redirect()->to('/');
        }
    }
    public function show()
    {
        if (session()->get('name') == True) {
            $first_date = $this->request->getPost('first_date');
            $end_date = $this->request->getPost('end_date');
            $data = [
                'title' => 'Page | Condition Serviceable',
                'serviceable' => $this->Serviceable->getDetailServiceable($first_date, $end_date),
                'user' => $this->User->getData(),
                'first_date' => $first_date,
                'end_date' => $end_date
            ];
            //dd($data);
            return view('sparecondition/serviceable/V_serviceable', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function excel($first_date, $end_date, $mid_date, $first_date1, $end_date1, $mid_date1)
    {
        if (session()->get('name') == True) {
            $first = $first_date . '/' . $end_date . '/' . $mid_date;
            $end = $first_date1 . '/' . $end_date1 . '/' . $mid_date1;
            $data = [
                'serviceable' => $this->Serviceable->getDetailServiceable($first, $end),

                'first_date' => $first,
                'end_date' => $end

            ];
            //dd($data);
            return view('sparecondition/serviceable/excel', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function print($first_date, $end_date, $mid_date, $first_date1, $end_date1, $mid_date1)
    {
        if (session()->get('name') == True) {
            $first = $first_date . '/' . $end_date . '/' . $mid_date;
            $end = $first_date1 . '/' . $end_date1 . '/' . $mid_date1;
            $data = [

                'serviceable' => $this->Serviceable->getDetailServiceable($first, $end),
                'first_date' => $first_date . '/' . $end_date . '/' . $mid_date,
                'end_date' => $first_date1 . '/' . $end_date1 . '/' . $mid_date1,


            ];
            //dd($data);
            //return 
            $html = view('sparecondition/serviceable/print', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);

            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('Report Data List Serviceable ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }
}
