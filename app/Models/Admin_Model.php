<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_Model extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'uid';
    protected $allowedFields = ['nama', 'email', 'password', 'role', 'picture', 'divisi_user', 'tanggal_lahir', 'gender', 'nama_divisi'];

    // ============= CRUD Data User ================

    public function getUser()
    {
        return $this->findAll();
    }

    public function addUser($data)
    {
        $query = $this->db->table('user')->insert($data);
        return $query;
    }

    public function updateUser($data, $id)
    {
        $query = $this->db->table('user')->update($data, array('uid' => $id));
        return $query;
    }

    public function deleteUser($id)
    {
        $query = $this->db->table('user')->delete(array('uid' => $id));
        return $query;
    }

    public function countUser()
    {
        return $this->db->table('user')->selectCount('uid')->distinct()->get()->getResultArray();
    }
}
