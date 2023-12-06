<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SparepartModel;
use App\Models\SparepartOutModel;
use App\Models\Spareparts;
use App\Models\UsersModel;
use \Dompdf\Dompdf;
use \Dompdf\Options;

class Inventory extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Option = new Options();
        $this->Sparepart = new SparepartModel();
        $this->Spareparts = new Spareparts();
        $this->SparepartsOut = new SparepartOutModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Report Barang / Sparepart Masuk',
                'in' => $this->Sparepart->getDetail3(),
                'sparepart' => $this->Spareparts->getData(),
                'sum' => $this->Sparepart->countSparepart(),
                'user' => $this->User->getData(),
                'first_date' => '',
                'end_date' => '',
                'kd_barang' => ''

            ];
            //dd($data);
            return view('inventory/V_inventory', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function excel($first_date, $end_date, $mid_date, $first_date1, $end_date1, $mid_date1, $kd_barang)
    {
        if (session()->get('name') == True) {
            $first = $first_date . '/' . $end_date . '/' . $mid_date;
            $end = $first_date1 . '/' . $end_date1 . '/' . $mid_date1;
            $data = [
                'title' => 'Page | Report Barang / Sparepart Masuk',
                'in' => $this->Sparepart->getDetail2($first, $end, $kd_barang),
                'sum' => $this->Sparepart->countSparepart2($first, $end, $kd_barang),
                'sparepart' => $this->Spareparts->getData(),
                'first_date' => $first,
                'end_date' => $end

            ];
            //dd($data);
            return view('inventory/excel', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function excels($first_date, $end_date, $mid_date, $first_date1, $end_date1, $mid_date1, $kd_barang)
    {
        if (session()->get('name') == True) {
            $first = $first_date . '/' . $end_date . '/' . $mid_date;
            $end = $first_date1 . '/' . $end_date1 . '/' . $mid_date1;
            $data = [
                'title' => 'Page | Report Barang / Sparepart Keluar',
                'out' => $this->SparepartsOut->getDetail2($first, $end, $kd_barang),
                'sum' => $this->SparepartsOut->countSparepart2($first, $end, $kd_barang),
                'sparepart' => $this->Spareparts->getData(),
                'first_date' => $first,
                'end_date' => $end,
                'kd_barang' => $kd_barang

            ];
            //dd($data);
            return view('inventory/excels', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function stocks()
    {
        if (session()->get('name') == True) {

            $data = [
                'title' => 'Page | Report List Inventory Barang / Sparepart',
                'sparepart' => $this->Spareparts->getDatas()


            ];
            //dd($data);
            return view('inventory/cetak', $data);
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
    public function out()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Report Barang / Sparepart Keluar',
                'out' => $this->SparepartsOut->getData(),
                'sparepart' => $this->Spareparts->getData(),
                'sum' => $this->SparepartsOut->countSparepart(),
                'user' => $this->User->getData(),
                'first_date' => '',
                'end_date' => '',
                'kd_barang' => ''

            ];
             //dd($data);
            return view('inventory/V_inventory_out', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function stock()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Report Barang / Sparepart Keluar',
                'sparepart' => $this->Spareparts->getDatas(),
                'user' => $this->User->getData(),
                'first_date' => '',
                'end_date' => ''

            ];
            //dd($data);
            return view('inventory/V_inventorys', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function tampil()
    {
        if (session()->get('name') == True) {
            $first_date = $this->request->getPost('first_date');
            $end_date = $this->request->getPost('end_date');
            $kd_barang = $this->request->getPost('kd_barang');
            $data = [
                'title' => 'Page | Report Barang / Sparepart Keluar',
                'out' => $this->SparepartsOut->getDetail2($first_date, $end_date, $kd_barang),
                'sum' => $this->SparepartsOut->countSparepart2($first_date, $end_date, $kd_barang),
                'sparepart' => $this->Spareparts->getData(),
                'user' => $this->User->getData(),
                'first_date' => $first_date,
                'end_date' => $end_date,
                'kd_barang' => $kd_barang
            ];
            //dd($data);
            return view('inventory/V_inventory_out', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function show()
    {
        if (session()->get('name') == True) {
            $first_date = $this->request->getPost('first_date');
            $end_date = $this->request->getPost('end_date');
            $kd_barang = $this->request->getPost('kd_barang');
            $data = [
                'title' => 'Page | Report Barang / Sparepart Masuk',
                'in' => $this->Sparepart->getDetail2($first_date, $end_date, $kd_barang),
                'sum' => $this->Sparepart->countSparepart2($first_date, $end_date, $kd_barang),
                'sparepart' => $this->Spareparts->getData(),
                'user' => $this->User->getData(),
                'first_date' => $first_date,
                'end_date' => $end_date,
                'kd_barang' => $kd_barang
            ];
            //dd($data);
            return view('inventory/V_inventory', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function print($first_date, $end_date, $mid_date, $first_date1, $end_date1, $mid_date1, $kd_barang)
    {
        if (session()->get('name') == True) {
            $first = $first_date . '/' . $end_date . '/' . $mid_date;
            $end = $first_date1 . '/' . $end_date1 . '/' . $mid_date1;
            $data = [
                'title' => 'Report Barang / Sparepart Masuk',
                'in' => $this->Sparepart->getDetail2($first, $end, $kd_barang),
                'sum' => $this->Sparepart->countSparepart2($first, $end, $kd_barang),
                'first_date' => $first,
                'end_date' => $end,
                'kd_barang' => $kd_barang


            ];
            //dd($data);
            //return 
            $html = view('inventory/Print_in', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);
            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('Report Barang / Sparepart Masuk ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }
    public function prints($first_date, $end_date, $mid_date, $first_date1, $end_date1, $mid_date1, $kd_barang)
    {
        if (session()->get('name') == True) {
            $first = $first_date . '/' . $end_date . '/' . $mid_date;
            $end = $first_date1 . '/' . $end_date1 . '/' . $mid_date1;
            $data = [
                'title' => 'Report Barang / Sparepart Keluar',
                'out' => $this->SparepartsOut->getDetail2($first, $end, $kd_barang),
                'sum' => $this->SparepartsOut->countSparepart2($first, $end, $kd_barang),
                'first_date' => $first_date . '/' . $end_date . '/' . $mid_date,
                'end_date' => $first_date1 . '/' . $end_date1 . '/' . $mid_date1,
                'kd_barang' => $kd_barang


            ];
            //dd($data);
            //return 
            $html = view('inventory/Print_out', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);
            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('Report Barang / Sparepart Keluar ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }
    public function pdf()
    {
        if (session()->get('name') == True) {

            $data = [
                'title' => 'Report List Inventory Barang / Sparepart',
                'sparepart' => $this->Spareparts->getDatas()


            ];
            //dd($data);
            //return 
            $html = view('inventory/pdf_stock', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);
            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('Report List Inventory Barang / Sparepart ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }
}
