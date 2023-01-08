<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'location';
    protected $primaryKey       = 'id_location';
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
        return $this->db->table('location')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            // ->where('passanger.role_id', '2')
            ->get()->getResultArray();
    }
    public function insertLocation($data)
    {
        $this->db->table('location')
            ->insert($data);
    }
    public function getDetail($id_location)
    {
        return $this->db->table('location')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_out.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('location.id_location', $id_location)

            ->get()->getResultArray();
    }
    public function editData($data)
    {
        $this->db->table('location')
            ->where('id_location', $data['id_location'])
            ->update($data);
    }
    public function deleteLocation($id_location)
    {
        $this->db->table('location')->delete(array('id_location' => $id_location));
    }
}
