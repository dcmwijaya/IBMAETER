<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengumuman_Model extends Model
{
    protected $table = 'pengumuman';

    public function showTask()
    {
        // return $this->findAll();
        $builder = $this->db->table('pengumuman');
        $builder->select('*');
        $builder->join('user', 'user.uid = pengumuman.uid', 'left');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function showInfo()
    {
        return $this->findAll();
    }

    public function addInfo($data)
    {
        $query = $this->db->table('pengumuman')->insert($data);
        return $query;
    }

    public function editInfo($data, $id)
    {
        $query = $this->db->table('pengumuman')->update($data, array('id_pengumuman' => $id));
        return $query;
    }
}
