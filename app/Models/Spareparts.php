<?php

namespace App\Models;

use CodeIgniter\Model;

class Spareparts extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_barang';
    protected $primaryKey       = 'id_barang';
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
        $query = $this->db->query("SELECT * FROM tb_barang");
        $sparepart = $query->getNumRows();
        return $sparepart;
    }

    public function getData()
    {
        return $this->db->table('tb_barang')
            ->join('tb_satuan', 'tb_satuan.id_satuan=tb_barang.id_satuan')
            //->join('brg_keluar', 'brg_keluar.kd_barang=tb_barang.kd_barang')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            // ->where('spareparts.id_sparepart=' . $id_sparepart)
            ->get()->getResultArray();
    }
    public function getDetail($id_keluar)
    {
        return $this->db->table('brg_keluar')
            ->join('tb_barang', 'tb_barang.kd_barang=brg_keluar.kd_barang')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('brg_keluar.id_keluar', $id_keluar)

            ->get()->getResultArray();
    }


    // list sparepart
    public function getDatas()
    {
        return $this->db->table('tb_barang')
            ->join('tb_satuan', 'tb_satuan.id_satuan=tb_barang.id_satuan')
            ->get()->getResultArray();
    }
    public function getDatasp()
    {
        return $this->db->table('tb_barang')
            ->join('brg_masuk', 'brg_masuk.kd_barang=tb_barang.kd_barang')
            ->get()->getResultArray();
    }
    public function insertSparepart($data)
    {
        $this->db->table('tb_barang')
            ->insert($data);
    }
    public function getDetails($id_barang)
    {
        return $this->db->table('tb_barang')
            ->join('tb_satuan', 'tb_satuan.id_satuan=tb_barang.id_satuan')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_out.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('tb_barang.id_barang', $id_barang)

            ->get()->getResultArray();
    }
    public function editSparepart($data)
    {
        $this->db->table('tb_barang')
            ->where('id_barang', $data['id_barang'])
            ->update($data);
    }
    public function deleteSpareparts($id_barang)
    {
        $this->db->table('tb_barang')->delete(array('id_barang' => $id_barang));
    }
}
