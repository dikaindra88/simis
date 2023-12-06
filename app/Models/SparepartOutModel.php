<?php

namespace App\Models;

use CodeIgniter\Model;

class SparepartOutModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'brg_keluar';
    protected $primaryKey       = 'id_keluar';
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
        return $this->db->table('brg_keluar')->get()->getNumRows();
    }
    public function dataKeluar($data)
    {
        $this->db->table('brg_keluar')
            ->insert($data);
    }
    public function countSparepart()
    {
        return $this->db->table('brg_keluar')->selectSum('qty_out')->get()->getResultArray();
    }
    public function countSparepart2($first_date, $end_date, $kd_barang)
    {
        return $this->db->table('brg_keluar')
            ->selectSum('qty_out')
            ->where('brg_keluar.tgl_keluar >=', $first_date)
            ->where('brg_keluar.tgl_keluar <=', $end_date)
            ->where('brg_keluar.kd_barang =', $kd_barang)
            ->get()->getResultArray();
    }
    public function getData()
    {
        return $this->db->table('brg_keluar')
            ->join('tb_barang', 'tb_barang.kd_barang=brg_keluar.kd_barang')
            ->join('tb_kondisi', 'tb_kondisi.id_kondisi=brg_keluar.id_kondisi')
            ->join('tb_personnel', 'tb_personnel.id_personnel=brg_keluar.id_personnel')
            ->join('tb_satuan', 'tb_satuan.id_satuan=brg_keluar.id_satuan')
            ->orderBy('id_keluar', 'asc')
            ->get()->getResultArray();
    }
    public function getData2($id_keluar)
    {
        return $this->db->table('brg_keluar')
            ->join('tb_barang', 'tb_barang.kd_barang=brg_keluar.kd_barang')
            ->join('tb_kondisi', 'tb_kondisi.id_kondisi=brg_keluar.id_kondisi')
            ->join('tb_personnel', 'tb_personnel.id_personnel=brg_keluar.id_personnel')
            ->join('tb_satuan', 'tb_satuan.id_satuan=brg_keluar.id_satuan')
            ->where('brg_keluar.id_keluar=' . $id_keluar)

            ->get()->getResultArray();
    }
    public function getDetail2($first_date, $end_date, $kd_barang)
    {
        return $this->db->table('brg_keluar')
            ->join('tb_barang', 'tb_barang.kd_barang=brg_keluar.kd_barang')
            ->join('tb_kondisi', 'tb_kondisi.id_kondisi=brg_keluar.id_kondisi')
            ->join('tb_personnel', 'tb_personnel.id_personnel=brg_keluar.id_personnel')
            ->join('tb_satuan', 'tb_satuan.id_satuan=brg_keluar.id_satuan')
            ->where('brg_keluar.tgl_keluar >=', $first_date)
            ->where('brg_keluar.tgl_keluar <=', $end_date)
            ->where('brg_keluar.kd_barang =', $kd_barang)
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
        return $this->db->table('brg_keluar')
            ->join('tb_barang', 'tb_barang.kd_barang=brg_keluar.kd_barang')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->get()->getResultArray();
    }
    public function editData($data)
    {
        $this->db->table('brg_keluar')
            ->where('id_keluar', $data['id_keluar'])
            ->update($data);
    }

    public function deleteSparepart($id_keluar)
    {
        $this->db->table('brg_keluar')->delete(array('id_keluar' => $id_keluar));
    }
}
