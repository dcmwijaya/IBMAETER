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

    public function showExpVisibility()
    {
        // return $this->findAll();
        $look = array('status' => 'Belum Dilihat');
        $builder = $this->db->table('pengumuman_visibility');
        $builder->select('*');
        $builder->join('pengumuman', 'pengumuman.id_pengumuman = pengumuman_visibility.id_pengumuman');
        $builder->join('user', 'user.uid = pengumuman_visibility.uid');
        $builder->where($look);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function CountExpVisibility($uid)
    {
        $look = array('status' => 'Belum Dilihat');
        $builder = $this->db->table('pengumuman_visibility');
        $builder->where($uid);
        $builder->where($look);
        $query = $builder->countAllResults();
        return $query;
    }

    public function showInfo()
    {
        return $this->findAll();
    }

    public function getIdPengumuman($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_pengumuman' => $id])->first();
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
