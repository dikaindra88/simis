<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ManualModel;
use App\Models\UsersModel;
use \Dompdf\Dompdf;
use \Dompdf\Options;

class Manual extends BaseController
{
    public function __construct()
    {
        $this->Option = new Options();
        $this->User = new UsersModel();
        $this->Manual = new ManualModel();
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Document Manual',
                'user' => $this->User->getData(),
                'manual' => $this->Manual->getData(),
                'depart' => $this->Manual->getDepartement()
            ];
            //dd($data);
            return view('manual/V_manual', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function insert()
    {


        $image = $this->request->getFile('manual');
        $nama_file = $image->getName();
        $data = [
            'id_departement' => $this->request->getPost('id_departement'),
            'title' => $this->request->getPost('title'),
            'level_1' => $this->request->getPost('level_1'),
            'level_2' => $this->request->getPost('level_2'),
            'level_3' => $this->request->getPost('level_3'),
            'issue' => $this->request->getPost('issue'),
            'revision' => $this->request->getPost('revision'),
            'level_2' => $this->request->getPost('level_2'),
            'level_3' => $this->request->getPost('level_3'),
            'manual' => $nama_file


        ];

        $image->move('Document-Manual/', $nama_file);
        $this->Manual->insertData($data);

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/Manual');
    }
    public function getPdf($id_manual)
    {
        if (session()->get('name') == True) {
            $data = [
                'manual' => $this->Manual->getDetail($id_manual),
                'user' => $this->User->getData(),
            ];

            return view('manual/pdf', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function update($id_manual)
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page Update | Manual',
                'manual' => $this->Manual->getDetail($id_manual),
                'user' => $this->User->getData(),
                'depart' => $this->Manual->getDepartement()
            ];

            return view('manual/V_update', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function EditAction($id_manual)
    {
        $file = $this->request->getFile('manual');
        if ($file->getError() == 4) {
            $data = [
                'id_manual' => $id_manual,
                'id_departement' => $this->request->getPost('id_departement'),
                'title' => $this->request->getPost('title'),
                'level_1' => $this->request->getPost('level_1'),
                'level_2' => $this->request->getPost('level_2'),
                'level_3' => $this->request->getPost('level_3'),
                'issue' => $this->request->getPost('issue'),
                'revision' => $this->request->getPost('revision'),
                'rev_date' => $this->request->getPost('rev_date'),
                'remark' => $this->request->getPost('remark')
            ];
            $this->Manual->editData($data);
        } else {



            $file = $this->request->getFile('manual');
            $nama_file = $file->getName();
            $data = [
                'id_manual' => $id_manual,
                'id_departement' => $this->request->getPost('id_departement'),
                'title' => $this->request->getPost('title'),
                'level_1' => $this->request->getPost('level_1'),
                'level_2' => $this->request->getPost('level_2'),
                'level_3' => $this->request->getPost('level_3'),
                'issue' => $this->request->getPost('issue'),
                'revision' => $this->request->getPost('revision'),
                'rev_date' => $this->request->getPost('rev_date'),
                'remark' => $this->request->getPost('remark'),
                'manual' => $nama_file
            ];
            // upload file foto
            $file->move('Document-Manual/', $nama_file);

            $this->Manual->editData($data);
        }

        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/Manual');
    }
    public function deleteData($id_manual)
    {

        $this->Manual->deleteData($id_manual);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/Manual');
    }
    public function Convert()
    {
        if (session()->get('name') == True) {

            $data = [

                'manual' => $this->Manual->getData(),



            ];
            //dd($data);
            //return 
            $html = view('manual/V_Pdf', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);
            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('REPORT COMPANY MANUAL CONTROL LIST ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }

    public function Print()
    {
        if (session()->get('name') == True) {

            $data = [
                'manual' => $this->Manual->getData()
            ];
            //dd($data);
            return view('manual/Print', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
