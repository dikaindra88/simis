<?php

namespace App\Controllers\DocOnboard;

use App\Controllers\BaseController;
use App\Models\AcregModel;
use App\Models\DocumentModel;
use App\Models\UsersModel;
use \Dompdf\Dompdf;
use \Dompdf\Options;

class PKRDA extends BaseController
{
    public function __construct()
    {
        $this->Option = new Options();
        $this->Doc = new DocumentModel();
        $this->User = new UsersModel();
        $this->Acreg = new AcregModel();
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Document PK-RDA',
                'user' => $this->User->getData(),
                'doc' => $this->Doc->getPKRDA(),
                'acdoc' => $this->Doc->getAcdoc(),
                'acreg' => $this->Acreg->getData()
            ];
            //dd($data);
            return view('doconboard/pkrda/V_rda', $data);
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
        return redirect()->to('/PK-RDA');
    }
    public function getPdf($id_document)
    {
        if (session()->get('name') == True) {
            $data = [
                'doc' => $this->Doc->getDetailPKRDA($id_document),
                'user' => $this->User->getData(),
            ];

            return view('doconboard/pkrda/pdf', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function update($id_document)
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page Update | PK-RDA',
                'doc' => $this->Doc->getDetailPKRDA($id_document),
                'user' => $this->User->getData(),
                'acdoc' => $this->Doc->getAcdoc()
            ];

            return view('doconboard/pkrda/V_update', $data);
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
        return redirect()->to('/PK-RDA');
    }
    public function deleteData($id_document)
    {

        $this->Doc->deleteData($id_document);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/PK-RDA');
    }
    public function Convert()
    {
        if (session()->get('name') == True) {

            $data = [

                'doc' => $this->Doc->getPKRDA(),



            ];
            //dd($data);
            //return 
            $html = view('doconboard/pkrda/V_Pdf', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);
            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'potrait');
            $dompdf->render();
            $dompdf->stream('REPORT DOCUMENT ONBOARD PK-RDA ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }

    public function Print()
    {
        if (session()->get('name') == True) {

            $data = [
                'doc' => $this->Doc->getPKRDA()
            ];
            //dd($data);
            return view('doconboard/pkrda/Print', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
