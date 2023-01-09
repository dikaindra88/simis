<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonnelModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'personnel';
    protected $primaryKey       = 'id_personnel';
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
        return $this->db->table('personnel')
            ->join('position', 'position.id_position=personnel.id_position')
            ->join('authorized', 'authorized.id_auth=personnel.id_auth')
            ->join('rii', 'rii.id_rii=personnel.id_rii')
            ->join('ac_type', 'ac_type.id_aircraft=personnel.id_aircraft')
            ->get()->getResultArray();
    }
    public function getDetail($id_personnel)
    {
        return $this->db->table('personnel')
            ->join('position', 'position.id_position=personnel.id_position')
            ->join('authorized', 'authorized.id_auth=personnel.id_auth')
            ->join('rii', 'rii.id_rii=personnel.id_rii')
            ->join('ac_type', 'ac_type.id_aircraft=personnel.id_aircraft')
            ->where('personnel.id_personnel', $id_personnel)
            ->get()->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('personnel')->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('personnel')
            ->where('id_personnel', $data['id_personnel'])
            ->update($data);
    }

    public function deleteData($id_personnel)
    {
        $this->db->table('personnel')->delete(array('id_personnel' => $id_personnel));
    }
}
