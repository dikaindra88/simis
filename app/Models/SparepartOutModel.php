<?php

namespace App\Models;

use CodeIgniter\Model;

class SparepartOutModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'spareparts_out';
    protected $primaryKey       = 'id_partout';
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

    public function countSparepartOut()
    {
        $query = $this->db->query("SELECT * FROM spareparts_out");
        $sparepart_out = $query->getNumRows();
        return $sparepart_out;
    }
    public function dataKeluar($data)
    {
        $this->db->table('spareparts_out')
            ->insert($data);
    }
    public function getData()
    {
        return $this->db->table('spareparts_out')
            ->join('spareparts', 'spareparts.kd_sparepart=spareparts_out.kd_sparepart')
            ->join('conditions', 'conditions.id_condition=spareparts_out.id_condition')
            ->join('oum', 'oum.id_oum=spareparts_out.id_oum')
            ->join('givento', 'givento.id_given_to=spareparts_out.id_given_to')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            // ->where('spareparts.id_sparepart=' . $id_sparepart)
            ->orderBy('id_partout', 'asc')
            ->get()->getResultArray();
    }
    public function getDetail2($first_date, $end_date)
    {
        return $this->db->table('spareparts_out')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_out.kd_sparepart')
            ->join('conditions', 'conditions.id_condition=spareparts_out.id_condition')
            ->join('oum', 'oum.id_oum=spareparts_out.id_oum')
            ->join('givento', 'givento.id_given_to=spareparts_out.id_given_to')
        ->where('spareparts_out.date_out >=', $first_date)
        ->where('spareparts_out.date_out <=', $end_date)

        ->get()->getResultArray();
        
    }
    public function getDetail3()
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
       

        ->get()->getResultArray();
        
    }
    public function getData3()
    {
        return $this->db->table('spareparts_out')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_out.kd_sparepart')
        // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
        ->get()->getResultArray();
        
    }
    public function editData($data)
    {
        $this->db->table('spareparts_out')
            ->where('id_partout', $data['id_partout'])
            ->update($data);
    }
    
    public function deleteSparepart($id_partout)
    {
        $this->db->table('spareparts_out')->delete(array('id_partout' => $id_partout));
    }
}
