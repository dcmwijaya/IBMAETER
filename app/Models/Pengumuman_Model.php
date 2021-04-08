<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengumuman_Model extends Model
{
    protected $table = 'pengumuman';

    public function showTask()
    {
        return $this->findAll();
    }

    public function showInfo()
    {
        return $this->findAll();
    }

    public function editInfo($data, $id)
    {
        $query = $this->db->table('pengumuman')->update($data, array('id' => $id));
        return $query;
    }
}
