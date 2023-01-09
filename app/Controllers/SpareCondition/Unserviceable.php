<?php

namespace App\Controllers\SpareCondition;

use App\Controllers\BaseController;
use App\Models\SparepartModel;
use \Dompdf\Dompdf;
use \Dompdf\Options;
use App\Models\UsersModel;

class Unserviceable extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Option = new Options();
        $this->Unserviceable = new SparepartModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Condition Unserviceable',
                'un' => $this->Unserviceable->getUnserviceable(),
                'user' => $this->User->getData(),
                'first_date' => '',
                'end_date' => ''
            ];
            return view('sparecondition/unserviceable/V_unserviceable', $data);
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
                'title' => 'Page | Condition Unserviceable',
                'un' => $this->Unserviceable->getDetailUnserviceable($first_date, $end_date),
                'user' => $this->User->getData(),
                'first_date' => $first_date,
                'end_date' => $end_date
            ];
            //dd($data);
            return view('sparecondition/unserviceable/V_unserviceable', $data);
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
                'un' => $this->Unserviceable->getDetailUnserviceable($first, $end),

                'first_date' => $first,
                'end_date' => $end

            ];
            //dd($data);
            return view('sparecondition/unserviceable/excel', $data);
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

                'un' => $this->Unserviceable->getDetailUnserviceable($first, $end),
                'first_date' => $first_date . '/' . $end_date . '/' . $mid_date,
                'end_date' => $first_date1 . '/' . $end_date1 . '/' . $mid_date1,


            ];
            //dd($data);
            //return 
            $html = view('sparecondition/unserviceable/print', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);

            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('Report Data List Unserviceable ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }
}
