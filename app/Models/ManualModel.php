<?php

namespace App\Models;

use CodeIgniter\Model;

class ManualModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'manual';
    protected $primaryKey       = 'id_manual';
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

    public function getData()
    {
        return $this->db->table('manual')
            ->join('departement', 'departement.id_departement=manual.id_departement')

            ->get()->getResultArray();
    }
    public function getDetail($id_manual)
    {
        return $this->db->table('manual')
            ->join('departement', 'departement.id_departement=manual.id_departement')
            ->where('manual.id_manual', $id_manual)
            ->get()->getResultArray();
    }
    public function getDepartement()
    {
        return $this->db->table('departement')
            ->get()->getResultArray();
    }
    public function insertData($data)
    {
        $this->db->table('manual')->insert($data);
    }
    public function editData($data)
    {
        $this->db->table('manual')
            ->where('id_manual', $data['id_manual'])
            ->update($data);
    }
    public function deleteData($id_manual)
    {
        $this->db->table('manual')->delete(array('id_manual' => $id_manual));
    }
}
