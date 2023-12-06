<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'request';
    protected $primaryKey       = 'id_request';
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
        return $this->db->table('tb_request')
            ->join('tb_barang', 'tb_barang.kd_barang=tb_request.kd_barang')
            ->join('tb_departement', 'tb_departement.id_depart=tb_request.id_depart')
            ->join('tb_satuan', 'tb_satuan.id_satuan=tb_request.id_satuan')
            ->get()->getResultArray();
    }

    public function getData2()
    {
        return $this->db->table('tb_request')
            ->join('tb_barang', 'tb_barang.kd_barang=tb_request.kd_barang')
            ->join('tb_departement', 'tb_departement.id_depart=tb_request.id_depart')
            ->join('tb_satuan', 'tb_satuan.id_satuan=tb_request.id_satuan')
            ->where('tb_request.id_depart =', 1)
            ->get()->getResultArray();
    }
    public function getData3()
    {
        return $this->db->table('tb_request')
            ->join('tb_barang', 'tb_barang.kd_barang=tb_request.kd_barang')
            ->join('tb_departement', 'tb_departement.id_depart=tb_request.id_depart')
            ->join('tb_satuan', 'tb_satuan.id_satuan=tb_request.id_satuan')
            ->where('tb_request.id_depart', 2)
            ->get()->getResultArray();
    }
    public function getData4()
    {
        return $this->db->table('tb_request')
            ->join('tb_barang', 'tb_barang.kd_barang=tb_request.kd_barang')
            ->join('tb_departement', 'tb_departement.id_depart=tb_request.id_depart')
            ->join('tb_satuan', 'tb_satuan.id_satuan=tb_request.id_satuan')
            ->where('tb_request.id_depart =', 3)
            ->get()->getResultArray();
    }

    public function updateData($data)
    {
        $this->db->table('tb_request')->where('id_request', $data['id_request'])->update($data);
    }

    public function insertData($data)
    {
        $this->db->table('tb_request')
            ->insert($data);
    }

    public function getDetail($id_request)
    {
        return $this->db->table('tb_request')
            ->join('tb_barang', 'tb_barang.kd_barang=tb_request.kd_barang')
            ->join('tb_departement', 'tb_departement.id_depart=tb_request.id_depart')
            ->join('tb_satuan', 'tb_satuan.id_satuan=tb_request.id_satuan')
            ->where('tb_request.id_request =', $id_request)
            ->get()->getResultArray();
    }
    public function editData($data)
    {
        $this->db->table('tb_request')->where('id_request', $data['id_request'])->update($data);
    }
}
