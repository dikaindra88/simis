<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
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

    public function countUser()
    {
        $query = $this->db->query("SELECT * FROM users");
        $user = $query->getNumRows();
        return $user;
    }
    public function login_user($email, $password)
    {
        return $this->db->table('users')->where(
            [
                'email' => $email,
                'password' => $password
            ]
        )->get()->getRowArray();
    }
    public function getData()
    {
        return $this->db->table('users')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_in.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            // ->where('passanger.role_id', '2')
            ->get()->getResultArray();
    }
    public function insertUsers($data)
    {
        $this->db->table('users')
            ->insert($data);
    }
    public function getDetail($user_id)
    {
        return $this->db->table('users')
            //->join('spareparts', 'spareparts.kd_sparepart=spareparts_out.kd_sparepart')
            // ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('users.user_id', $user_id)

            ->get()->getResultArray();
    }
    public function editData($data)
    {
        $this->db->table('users')
            ->where('user_id', $data['user_id'])
            ->update($data);
    }
    public function deleteUsers($user_id)
    {
        $this->db->table('users')->delete(array('user_id' => $user_id));
    }
}
