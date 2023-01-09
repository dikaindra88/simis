<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PersonnelModel;
use App\Models\UsersModel;

class Personnel extends BaseController
{
    public function __construct()
    {
        $this->Person = new PersonnelModel();
        $this->User = new UsersModel();
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Document PK-YGK',
                'user' => $this->User->getData(),
                'person' => $this->Person->getData(),
                'acdoc' => $this->Doc->getAcdoc(),
                'acreg' => $this->Acreg->getData()
            ];
            //dd($data);
            return view('doconboard/pkygk/V_ygk', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function insert()
    {


        $image = $this->request->getFile('doc_onboard');
        $nama_file = $image->getName();
        $data = [
            'id_acreg' => $this->request->getPost('id_acreg'),
            'id_acdoc' => $this->request->getPost('id_acdoc'),
            'issued' => $this->request->getPost('issued'),
            'expired' => $this->request->getPost('expired'),
            'status' => $this->request->getPost('status'),
            'remark' => $this->request->getPost('remark'),
            'doc_onboard' => $nama_file
        ];

        $image->move('Document-Onboard/', $nama_file);
        $this->Doc->insertData($data);

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/PK-YGK');
    }
    public function getPdf($id_document)
    {
        if (session()->get('name') == True) {
            $data = [
                'doc' => $this->Doc->getDetailPKYGK($id_document),
                'user' => $this->User->getData(),
            ];

            return view('doconboard/pkygk/pdf', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function update($id_document)
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page Update | PK-YGK',
                'doc' => $this->Doc->getDetailPKYGK($id_document),
                'user' => $this->User->getData(),
                'acdoc' => $this->Doc->getAcdoc()
            ];

            return view('doconboard/pkygk/V_update', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function EditAction($id_document)
    {
        $file = $this->request->getFile('doc_onboard');
        if ($file->getError() == 4) {
            $data = [
                'id_document' => $id_document,
                'issued' => $this->request->getPost('issued'),
                'expired' => $this->request->getPost('expired'),
                'status' => $this->request->getPost('status'),
                'remark' => $this->request->getPost('remark')
            ];
            $this->Doc->editData($data);
        } else {



            $file = $this->request->getFile('doc_onboard');
            $nama_file = $file->getName();
            $data = [
                'id_document' => $id_document,
                'issued' => $this->request->getPost('issued'),
                'expired' => $this->request->getPost('expired'),
                'status' => $this->request->getPost('status'),
                'remark' => $this->request->getPost('remark'),
                'doc_onboard' => $nama_file
            ];
            // upload file foto
            $file->move('Document-Onboard/', $nama_file);

            $this->Doc->editData($data);
        }

        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/PK-YGK');
    }
    public function deleteData($id_document)
    {

        $this->Doc->deleteData($id_document);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/PK-YGK');
    }
    public function Convert()
    {
        if (session()->get('name') == True) {

            $data = [

                'doc' => $this->Doc->getPKYGK(),



            ];
            //dd($data);
            //return 
            $html = view('doconboard/pkygk/V_Pdf', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);
            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'potrait');
            $dompdf->render();
            $dompdf->stream('REPORT DOCUMENT ONBOARD PK-YGK ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }

    public function Print()
    {
        if (session()->get('name') == True) {

            $data = [
                'doc' => $this->Doc->getPKYGK()
            ];
            //dd($data);
            return view('doconboard/pkygk/Print', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
