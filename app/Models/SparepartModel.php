<?php

namespace App\Models;

use CodeIgniter\Model;

class SparepartModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'spareparts_in';
    protected $primaryKey       = 'id_partin';
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

    public function countSparepartIn()
    {
        $query = $this->db->query("SELECT * FROM spareparts_in");
        $sparepart_in = $query->getNumRows();
        return $sparepart_in;
    }
    public function insertSparepart($data)
    {
        $this->db->table('spareparts_in')
            ->insert($data);
    }
    public function getData()
    {
        return $this->db->table('spareparts_in')
            ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
            ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            // ->where('passanger.role_id', '2')
            ->orderBy('spareparts_in.id_partin', 'asc')
            ->get()->getResultArray();
    }
    public function getServiceable()
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('spareparts_in.id_condition', '2')
        ->get()->getResultArray();
        
    }
    public function getUnserviceable()
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('spareparts_in.id_condition', '3')
        ->get()->getResultArray();
        
    }
    public function getFlameable()
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('spareparts_in.id_condition', '4')
        ->get()->getResultArray();
        
    }
    public function getNew()
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('conditions.id_condition', '5')
        ->get()->getResultArray();
        
    }
    public function getInspected()
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('conditions.id_condition', '10')
        ->get()->getResultArray();
        
    }
    public function getRepaired()
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('conditions.id_condition', '6')
        ->get()->getResultArray();
        
    }
    public function getOverhauled()
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('conditions.id_condition', '7')
        ->get()->getResultArray();
        
    }
    public function getNW()
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('conditions.id_condition', '9')
        ->get()->getResultArray();
        
    }

    public function getDetail($id_partin)
    {
        return $this->db->table('spareparts_in')
            ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
            ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
            ->join('location', 'location.id_location=spareparts_in.id_location')
            ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
            ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
            ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('spareparts_in.id_partin', $id_partin)

            ->get()->getResultArray();
    }
    public function editData($data)
    {
        $this->db->table('spareparts_in')
            ->where('id_partin', $data['id_partin'])
            ->update($data);
    }
    public function deleteSparepart($id_partin)
    {
        $this->db->table('spareparts_in')->delete(array('id_partin' => $id_partin));
    }
    public function getDatas()
    {
        return $this->db->table('spareparts_in')
            ->join('spareparts_out', 'spareparts_out.id_partin=spareparts.id_partin')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            // ->where('passanger.role_id', '2')
            ->get()->getResultArray();
    }
    public function getDetail2($first_date, $end_date)
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('spareparts_in.date_in >=', $first_date)
        ->where('spareparts_in.date_in <=', $end_date)

        ->get()->getResultArray();
        
    }
    public function getDetailServiceable($first_date, $end_date)
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('spareparts_in.date_in >=', $first_date)
        ->where('spareparts_in.date_in <=', $end_date)
        ->where('spareparts_in.id_condition', '2')

        ->get()->getResultArray();
        
    }
    public function getDetailUnserviceable($first_date, $end_date)
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('spareparts_in.date_in >=', $first_date)
        ->where('spareparts_in.date_in <=', $end_date)
        ->where('spareparts_in.id_condition', '3')

        ->get()->getResultArray();
        
    }
    public function getDetailFlameable($first_date, $end_date)
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('spareparts_in.date_in >=', $first_date)
        ->where('spareparts_in.date_in <=', $end_date)
        ->where('spareparts_in.id_condition', '4')

        ->get()->getResultArray();
        
    }
    public function getDetailNew($first_date, $end_date)
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('spareparts_in.date_in >=', $first_date)
        ->where('spareparts_in.date_in <=', $end_date)
        ->where('spareparts_in.id_condition', '5')
        ->get()->getResultArray();
    }
    public function getDetailInspected($first_date, $end_date)
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('spareparts_in.date_in >=', $first_date)
        ->where('spareparts_in.date_in <=', $end_date)
        ->where('spareparts_in.id_condition', '10')
        ->get()->getResultArray();
    }
    public function getDetailRepaired($first_date, $end_date)
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('spareparts_in.date_in >=', $first_date)
        ->where('spareparts_in.date_in <=', $end_date)
        ->where('spareparts_in.id_condition', '6')
        ->get()->getResultArray();
    }
    public function getDetailOverhauled($first_date, $end_date)
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('spareparts_in.date_in >=', $first_date)
        ->where('spareparts_in.date_in <=', $end_date)
        ->where('conditions.id_condition', '7')
        ->get()->getResultArray();
        
    }
    public function getDetailNW($first_date, $end_date)
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->where('spareparts_in.date_in >=', $first_date)
        ->where('spareparts_in.date_in <=', $end_date)
        ->where('conditions.id_condition', '9')
        ->get()->getResultArray();
        
    }
    public function getDetail3()
    {
        return $this->db->table('spareparts_in')
        ->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
        ->join('conditions', 'conditions.id_condition=spareparts_in.id_condition')
        ->join('location', 'location.id_location=spareparts_in.id_location')
        ->join('oum', 'oum.id_oum=spareparts_in.id_oum')
        ->join('orders', 'orders.id_pro=spareparts_in.id_pro')
        ->join('acregist', 'acregist.id_acreg=spareparts_in.id_acreg')
        ->get()->getResultArray();
        
    }
}
