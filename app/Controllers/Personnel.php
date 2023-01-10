<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PersonnelModel;
use App\Models\UsersModel;
use \Dompdf\Dompdf;
use \Dompdf\Options;

class Personnel extends BaseController
{
    public function __construct()
    {
        $this->Option = new Options();
        $this->Person = new PersonnelModel();
        $this->User = new UsersModel();
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Data Personnel',
                'user' => $this->User->getData(),
                'person' => $this->Person->getData(),
                'pos' => $this->Person->getPosition(),

            ];
            // dd($data);
            return view('personnel/V_personnel', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function insert()
    {
        $file = $this->request->getFile('doc_person');
        if ($file->getError() == 4) {
            $data = [
                'name' => $this->request->getPost('name'),
                'id_position' => $this->request->getPost('id_position'),
                'a1' => $this->request->getPost('a1'),
                'a4' => $this->request->getPost('a4'),
                'a2' => $this->request->getPost('a2'),
                'a3' => $this->request->getPost('a3'),
                'c1' => $this->request->getPost('c1'),
                'c2' => $this->request->getPost('c2'),
                'c4' => $this->request->getPost('c4'),
                'amel_no' => $this->request->getPost('amel_no'),
                'amel_valid' => $this->request->getPost('amel_valid'),
                'rii_no' => $this->request->getPost('rii_no'),
                'ac_type' => $this->request->getPost('ac_type'),
                'date_bi' => $this->request->getPost('date_bi'),
                'date_hf_initial' => $this->request->getPost('date_hf_initial'),
                'date_hf_lastrec' => $this->request->getPost('date_hf_lastrec'),
                'date_hf_nextrec' => $this->request->getPost('date_hf_nextrec'),
                'date_tot' => $this->request->getPost('date_tot'),
                'date_be_ppc' => $this->request->getPost('date_be_ppc'),
                'date_material' => $this->request->getPost('date_material'),
                'date_atrc_initial' => $this->request->getPost('date_atrc_initial'),
                'date_atrc_lastrec' => $this->request->getPost('date_atrc_lastrec'),
                'date_atrc_nextrec' => $this->request->getPost('date_atrc_nextrec'),
                'date_insp_rii' => $this->request->getPost('date_insp_rii'),
                'date_sms' => $this->request->getPost('date_sms'),
                'date_rvsm' => $this->request->getPost('date_rvsm'),
                'date_pbn' => $this->request->getPost('date_pbn')
            ];

            $this->Person->insertData($data);
        } else {

            $file = $this->request->getFile('doc_person');
            $nama_file = $file->getName();
            $data = [
                'name' => $this->request->getPost('name'),
                'id_position' => $this->request->getPost('id_position'),
                'a1' => $this->request->getPost('a1'),
                'a4' => $this->request->getPost('a4'),
                'a2' => $this->request->getPost('a2'),
                'a3' => $this->request->getPost('a3'),
                'c1' => $this->request->getPost('c1'),
                'c2' => $this->request->getPost('c2'),
                'c4' => $this->request->getPost('c4'),
                'amel_no' => $this->request->getPost('amel_no'),
                'amel_valid' => $this->request->getPost('amel_valid'),
                'auth_name' => $this->request->getPost('auth_name'),
                'auth_valid' => $this->request->getPost('auth_valid'),
                'rii_no' => $this->request->getPost('rii_no'),
                'ac_type' => $this->request->getPost('ac_type'),
                'date_bi' => $this->request->getPost('date_bi'),
                'date_hf_initial' => $this->request->getPost('date_hf_initial'),
                'date_hf_lastrec' => $this->request->getPost('date_hf_lastrec'),
                'date_hf_nextrec' => $this->request->getPost('date_hf_nextrec'),
                'date_tot' => $this->request->getPost('date_tot'),
                'date_be_ppc' => $this->request->getPost('date_be_ppc'),
                'date_material' => $this->request->getPost('date_material'),
                'date_atrc_initial' => $this->request->getPost('date_atrc_initial'),
                'date_atrc_lastrec' => $this->request->getPost('date_atrc_lastrec'),
                'date_atrc_nextrec' => $this->request->getPost('date_atrc_nextrec'),
                'date_insp_rii' => $this->request->getPost('date_insp_rii'),
                'date_sms' => $this->request->getPost('date_sms'),
                'date_rvsm' => $this->request->getPost('date_rvsm'),
                'date_pbn' => $this->request->getPost('date_pbn'),
                'doc_person' => $nama_file
            ];
            $file->move('document-person/', $nama_file);
            $this->Person->insertData($data);
        }

        session()->setFlashdata('pesan', 'Congratulation data successfully added');
        //dd($data);
        return redirect()->to('/Personnel');
    }
    public function getPdf($id_personnel)
    {
        if (session()->get('name') == True) {
            $data = [
                'person' => $this->Person->getDetail($id_personnel),
                'user' => $this->User->getData(),
            ];

            return view('personnel/pdf2', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function getPdf2($id_personnel)
    {
        if (session()->get('name') == True) {
            $data = [
                'person' => $this->Person->getDetail($id_personnel),
                'user' => $this->User->getData(),
            ];
            //dd($data);
            //return 
            $html = view('personnel/pdf', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);
            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'potrait');
            $dompdf->render();
            $dompdf->stream('DATA PERSONNEL.pdf');
        } else {
            return redirect()->to('/');
        }
    }
    public function update($id_personnel)
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Page | Document PK-YGK',
                'user' => $this->User->getData(),
                'person' => $this->Person->getDetail($id_personnel),
                'ac' => $this->Person->getAircraft(),
                'pos' => $this->Person->getPosition(),
                'rii' => $this->Person->getRii(),
                'auth' => $this->Person->getAuth()
            ];

            return view('personnel/V_update', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function EditAction($id_personnel)
    {
        $file = $this->request->getFile('doc_person');
        if ($file->getError() == 4) {
            $data = [
                'id_personnel' => $id_personnel,
                'name' => $this->request->getPost('name'),
                'id_position' => $this->request->getPost('id_position'),
                'a1' => $this->request->getPost('a1'),
                'a4' => $this->request->getPost('a4'),
                'a2' => $this->request->getPost('a2'),
                'a3' => $this->request->getPost('a3'),
                'c1' => $this->request->getPost('c1'),
                'c2' => $this->request->getPost('c2'),
                'c4' => $this->request->getPost('c4'),
                'amel_no' => $this->request->getPost('amel_no'),
                'amel_valid' => $this->request->getPost('amel_valid'),
                'auth_name' => $this->request->getPost('auth_name'),
                'auth_valid' => $this->request->getPost('auth_valid'),
                'rii_no' => $this->request->getPost('rii_no'),
                'ac_type' => $this->request->getPost('ac_type'),
                'date_bi' => $this->request->getPost('date_bi'),
                'date_hf_initial' => $this->request->getPost('date_hf_initial'),
                'date_hf_lastrec' => $this->request->getPost('date_hf_lastrec'),
                'date_hf_nextrec' => $this->request->getPost('date_hf_nextrec'),
                'date_tot' => $this->request->getPost('date_tot'),
                'date_be_ppc' => $this->request->getPost('date_be_ppc'),
                'date_material' => $this->request->getPost('date_material'),
                'date_atrc_initial' => $this->request->getPost('date_atrc_initial'),
                'date_atrc_lastrec' => $this->request->getPost('date_atrc_lastrec'),
                'date_atrc_nextrec' => $this->request->getPost('date_atrc_nextrec'),
                'date_insp_rii' => $this->request->getPost('date_insp_rii'),
                'date_sms' => $this->request->getPost('date_sms'),
                'date_rvsm' => $this->request->getPost('date_rvsm'),
                'date_pbn' => $this->request->getPost('date_pbn')
            ];

            $this->Person->editData($data);
        } else {

            $file = $this->request->getFile('doc_person');
            $nama_file = $file->getName();
            $data = [
                'id_personnel' => $id_personnel,
                'name' => $this->request->getPost('name'),
                'id_position' => $this->request->getPost('id_position'),
                'a1' => $this->request->getPost('a1'),
                'a4' => $this->request->getPost('a4'),
                'a2' => $this->request->getPost('a2'),
                'a3' => $this->request->getPost('a3'),
                'c1' => $this->request->getPost('c1'),
                'c2' => $this->request->getPost('c2'),
                'c4' => $this->request->getPost('c4'),
                'amel_no' => $this->request->getPost('amel_no'),
                'amel_valid' => $this->request->getPost('amel_valid'),
                'auth_name' => $this->request->getPost('auth_name'),
                'auth_valid' => $this->request->getPost('auth_valid'),
                'rii_no' => $this->request->getPost('rii_no'),
                'ac_type' => $this->request->getPost('ac_type'),
                'date_bi' => $this->request->getPost('date_bi'),
                'date_hf_initial' => $this->request->getPost('date_hf_initial'),
                'date_hf_lastrec' => $this->request->getPost('date_hf_lastrec'),
                'date_hf_nextrec' => $this->request->getPost('date_hf_nextrec'),
                'date_tot' => $this->request->getPost('date_tot'),
                'date_be_ppc' => $this->request->getPost('date_be_ppc'),
                'date_material' => $this->request->getPost('date_material'),
                'date_atrc_initial' => $this->request->getPost('date_atrc_initial'),
                'date_atrc_lastrec' => $this->request->getPost('date_atrc_lastrec'),
                'date_atrc_nextrec' => $this->request->getPost('date_atrc_nextrec'),
                'date_insp_rii' => $this->request->getPost('date_insp_rii'),
                'date_sms' => $this->request->getPost('date_sms'),
                'date_rvsm' => $this->request->getPost('date_rvsm'),
                'date_pbn' => $this->request->getPost('date_pbn'),
                'doc_person' => $nama_file
            ];
            $file->move('document-person/', $nama_file);
            $this->Person->editData($data);
        }

        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/Personnel');
    }
    public function deleteData($id_personnel)
    {

        $this->Person->deleteData($id_personnel);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/Personnel');
    }
    public function Convert()
    {
        if (session()->get('name') == True) {

            $data = [

                'person' => $this->Person->getData()
            ];
            //dd($data);
            //return 
            $html = view('personnel/V_Pdf', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);
            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('REPORT PERSONNEL TRAINING QUALIFICATION RECORD ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }

    public function Print()
    {
        if (session()->get('name') == True) {

            $data = [
                'person' => $this->Person->getData()
            ];
            //dd($data);
            return view('personnel/Print', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
