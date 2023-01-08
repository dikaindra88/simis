<?php

namespace App\Models;

use CodeIgniter\Model;

class Spareparts extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'spareparts';
    protected $primaryKey       = 'id_sparepart';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'description',
        'stock'
    ];

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


    public function countSparepart()
    {
        $query = $this->db->query("SELECT * FROM spareparts");
        $sparepart = $query->getNumRows();
        return $sparepart;
    }

    public function getData()
    {
        return $this->db->table('spareparts')
            ->join('spareparts_out', 'spareparts_out.kd_sparepart=spareparts.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            // ->where('spareparts.id_sparepart=' . $id_sparepart)
            ->get()->getResultArray();
    }
    public function getDetail($id_partout)
    {
        return $this->db->table('spareparts_out')
            ->join('spareparts', 'spareparts.kd_sparepart=spareparts_out.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('spareparts_out.id_partout', $id_partout)

            ->get()->getResultArray();
    }


    // list sparepart
    public function getDatas()
    {
        return $this->db->table('spareparts')->get()->getResultArray();
    }
    public function insertSparepart($data)
    {
        $this->db->table('spareparts')
            ->insert($data);
    }
    public function getDetails($id_sparepart)
    {
        return $this->db->table('spareparts')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_out.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('spareparts.id_sparepart', $id_sparepart)

            ->get()->getResultArray();
    }
    public function editSparepart($data)
    {
        $this->db->table('spareparts')
            ->where('id_sparepart', $data['id_sparepart'])
            ->update($data);
    }
    public function deleteSpareparts($id_sparepart)
    {
        $this->db->table('spareparts')->delete(array('id_sparepart' => $id_sparepart));
    }
}
