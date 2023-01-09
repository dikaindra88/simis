<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'document';
    protected $primaryKey       = 'id_document';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function insertData($data)
    {
        $this->db->table('document')->insert($data);
    }

    public function getData()
    {
        return $this->db->table('document')
            ->join('acregist', 'acregist.id_acreg=document.id_acreg')
            ->get()->getResultArray();
    }
    public function getPKYGR()
    {
        return $this->db->table('document')
            ->join('acregist', 'acregist.id_acreg=document.id_acreg')
            ->join('acdoc', 'acdoc.id_acdoc=document.id_acdoc')
            ->where('document.id_acreg', '2')
            ->get()->getResultArray();
    }
    public function getDetailPKYGR($id_document)
    {
        return $this->db->table('document')
            ->join('acregist', 'acregist.id_acreg=document.id_acreg')
            ->join('acdoc', 'acdoc.id_acdoc=document.id_acdoc')
            ->where('document.id_document', $id_document)
            ->where('document.id_acreg', '2')
            ->get()->getResultArray();
    }

    public function getPKYGK()
    {
        return $this->db->table('document')
            ->join('acregist', 'acregist.id_acreg=document.id_acreg')
            ->join('acdoc', 'acdoc.id_acdoc=document.id_acdoc')
            ->where('document.id_acreg', '3')
            ->get()->getResultArray();
    }
    public function getDetailPKYGK($id_document)
    {
        return $this->db->table('document')
            ->join('acregist', 'acregist.id_acreg=document.id_acreg')
            ->join('acdoc', 'acdoc.id_acdoc=document.id_acdoc')
            ->where('document.id_document', $id_document)
            ->where('document.id_acreg', '3')
            ->get()->getResultArray();
    }
    public function getPKRDA()
    {
        return $this->db->table('document')
            ->join('acregist', 'acregist.id_acreg=document.id_acreg')
            ->join('acdoc', 'acdoc.id_acdoc=document.id_acdoc')
            ->where('document.id_acreg', '4')
            ->get()->getResultArray();
    }
    public function getDetailPKRDA($id_document)
    {
        return $this->db->table('document')
            ->join('acregist', 'acregist.id_acreg=document.id_acreg')
            ->join('acdoc', 'acdoc.id_acdoc=document.id_acdoc')
            ->where('document.id_document', $id_document)
            ->where('document.id_acreg', '4')
            ->get()->getResultArray();
    }
    public function getPKRDG()
    {
        return $this->db->table('document')
            ->join('acregist', 'acregist.id_acreg=document.id_acreg')
            ->join('acdoc', 'acdoc.id_acdoc=document.id_acdoc')
            ->where('document.id_acreg', '5')
            ->get()->getResultArray();
    }
    public function getDetailPKRDG($id_document)
    {
        return $this->db->table('document')
            ->join('acregist', 'acregist.id_acreg=document.id_acreg')
            ->join('acdoc', 'acdoc.id_acdoc=document.id_acdoc')
            ->where('document.id_document', $id_document)
            ->where('document.id_acreg', '5')
            ->get()->getResultArray();
    }

    public function getAcdoc()
    {
        return $this->db->table('acdoc')->get()->getResultArray();
    }

    public function editData($data)
    {
        $this->db->table('document')
            ->where('id_document', $data['id_document'])
            ->update($data);
    }
    public function deleteData($id_document)
    {
        $this->db->table('document')->delete(array('id_document' => $id_document));
    }
}
