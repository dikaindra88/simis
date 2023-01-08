<?php

namespace App\Models;

use CodeIgniter\Model;

class GivenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'givento';
    protected $primaryKey       = 'id_given_to';
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
        return $this->db->table('givento')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            // ->where('passanger.role_id', '2')
            ->get()->getResultArray();
    }
    public function insertAcreg($data)
    {
        $this->db->table('givento')
            ->insert($data);
    }
    public function getDetail($id_given_to)
    {
        return $this->db->table('givento')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_out.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('givento.id_given_to', $id_given_to)

            ->get()->getResultArray();
    }
    public function editData($data)
    {
        $this->db->table('givento')
            ->where('id_given_to', $data['id_given_to'])
            ->update($data);
    }
    public function deleteAcreg($id_given_to)
    {
        $this->db->table('givento')->delete(array('id_given_to' => $id_given_to));
    }
}
