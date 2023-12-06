<?php

namespace App\Models;

use CodeIgniter\Model;

class SparepartModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'brg_masuk';
    protected $primaryKey       = 'id_masuk';
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
        return $this->db->table('brg_masuk')->get()->getNumRows();
    }
    public function insertSparepart($data)
    {
        $this->db->table('brg_masuk')
            ->insert($data);
    }
    public function countSparepart()
    {
        return $this->db->table('brg_masuk')->selectSum('qty_in')->get()->getResultArray();
    }
    public function countSparepart2($first_date, $end_date, $kd_barang)
    {
        return $this->db->table('brg_masuk')
            ->selectSum('qty_in')
            ->where('brg_masuk.tgl_masuk >=', $first_date)
            ->where('brg_masuk.tgl_masuk <=', $end_date)
            ->where('brg_masuk.kd_barang', $kd_barang)
            ->get()->getResultArray();
    }
    public function getData()
    {
        return $this->db->table('brg_masuk')
            ->join('tb_barang', 'tb_barang.kd_barang=brg_masuk.kd_barang')
            ->join('tb_kondisi', 'tb_kondisi.id_kondisi=brg_masuk.id_kondisi')
            ->join('tb_rak', 'tb_rak.id_rak=brg_masuk.id_rak')
            ->orderBy('brg_masuk.id_masuk', 'asc')
            ->get()->getResultArray();
    }

    public function getDetail($id_masuk)
    {
        return $this->db->table('brg_masuk')
            ->join('tb_barang', 'tb_barang.kd_barang=brg_masuk.kd_barang')
            ->join('tb_kondisi', 'tb_kondisi.id_kondisi=brg_masuk.id_kondisi')
            ->join('tb_rak', 'tb_rak.id_rak=brg_masuk.id_rak')
            ->join('tb_satuan', 'tb_satuan.id_satuan=brg_masuk.id_satuan')
            ->where('brg_masuk.id_masuk =', $id_masuk)

            ->get()->getResultArray();
    }
    public function editData($data)
    {
        $this->db->table('brg_masuk')
            ->where('id_masuk', $data['id_masuk'])
            ->update($data);
    }
    public function deleteSparepart($id_masuk)
    {
        $this->db->table('brg_masuk')->delete(array('id_masuk' => $id_masuk));
    }
    public function getDatas()
    {
        return $this->db->table('brg_masuk')
            ->join('brg_keluar', 'brg_keluar.id_masuk=brg_masuk.id_masuk')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            // ->where('passanger.role_id', '2')
            ->get()->getResultArray();
    }
    public function getDetail2($first_date, $end_date, $kd_barang)
    {
        return $this->db->table('brg_masuk')
            ->join('tb_barang', 'tb_barang.kd_barang=brg_masuk.kd_barang')
            ->join('tb_kondisi', 'tb_kondisi.id_kondisi=brg_masuk.id_kondisi')
            ->join('tb_rak', 'tb_rak.id_rak=brg_masuk.id_rak')
            ->join('tb_satuan', 'tb_satuan.id_satuan=brg_masuk.id_satuan')
            ->where('brg_masuk.tgl_masuk >=', $first_date)
            ->where('brg_masuk.tgl_masuk <=', $end_date)
            ->where('brg_masuk.kd_barang =', $kd_barang)

            ->get()->getResultArray();
    }

    public function getDetail3()
    {
        return $this->db->table('brg_masuk')
            ->join('tb_barang', 'tb_barang.kd_barang=brg_masuk.kd_barang')
            ->join('tb_kondisi', 'tb_kondisi.id_kondisi=brg_masuk.id_kondisi')
            ->join('tb_rak', 'tb_rak.id_rak=brg_masuk.id_rak')
            ->join('tb_satuan', 'tb_satuan.id_satuan=brg_masuk.id_satuan')
            ->get()->getResultArray();
    }
}
