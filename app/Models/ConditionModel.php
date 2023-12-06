<?php

namespace App\Models;

use CodeIgniter\Model;

class ConditionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_kondisi';
    protected $primaryKey       = 'id_kondisi';
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
        return $this->db->table('tb_kondisi')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            // ->where('passanger.role_id', '2')
            ->get()->getResultArray();
    }
    public function insertCondition($data)
    {
        $this->db->table('tb_kondisi')
            ->insert($data);
    }
    public function getDetail($id_kondisi)
    {
        return $this->db->table('tb_kondisi')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_out.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('tb_kondisi.id_kondisi', $id_kondisi)

            ->get()->getResultArray();
    }
    public function editData($data)
    {
        $this->db->table('tb_kondisi')
            ->where('id_kondisi', $data['id_kondisi'])
            ->update($data);
    }
    public function deleteCondition($id_kondisi)
    {
        $this->db->table('tb_kondisi')->delete(array('id_kondisi' => $id_kondisi));
    }
}
