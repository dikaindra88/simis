<?php

namespace App\Models;

use CodeIgniter\Model;

class AcregModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'acregist';
    protected $primaryKey       = 'id_acreg';
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
        return $this->db->table('acregist')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            // ->where('passanger.role_id', '2')
            ->get()->getResultArray();
    }
    public function insertAcreg($data)
    {
        $this->db->table('acregist')
            ->insert($data);
    }
    public function getDetail($id_acreg)
    {
        return $this->db->table('acregist')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_out.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('acregist.id_acreg', $id_acreg)

            ->get()->getResultArray();
    }
    public function editData($data)
    {
        $this->db->table('acregist')
            ->where('id_acreg', $data['id_acreg'])
            ->update($data);
    }
    public function deleteAcreg($id_acreg)
    {
        $this->db->table('acregist')->delete(array('id_acreg' => $id_acreg));
    }
}
