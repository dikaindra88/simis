<?php

namespace App\Models;

use CodeIgniter\Model;

class GivenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_personnel';
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

    public function login_user($nip)
    {
        return $this->db->table('tb_personnel')->where(
            [
                'nip_personnel' => $nip
            ]
        )->get()->getRowArray();
    }

    public function countPersonnel()
    {
        $query = $this->db->query("Select * From tb_personnel")->getNumRows();
        return $query;
    }
    public function getData()
    {
        return $this->db->table('tb_personnel')
            ->join('tb_departement', 'tb_departement.id_depart=tb_personnel.id_depart')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            // ->where('passanger.role_id', '2')
            ->get()->getResultArray();
    }
    public function insertAcreg($data)
    {
        $this->db->table('tb_personnel')
            ->insert($data);
    }
    public function getDetail($id_personnel)
    {
        return $this->db->table('tb_personnel')
            ->join('tb_departement', 'tb_departement.id_depart=tb_personnel.id_depart')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_out.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('tb_personnel.id_personnel', $id_personnel)

            ->get()->getResultArray();
    }
    public function editData($data)
    {
        $this->db->table('tb_personnel')
            ->where('id_personnel', $data['id_personnel'])
            ->update($data);
    }
    public function deleteAcreg($id_personnel)
    {
        $this->db->table('tb_personnel')->delete(array('id_personnel' => $id_personnel));
    }
}
