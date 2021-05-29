<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengumuman_Model extends Model
{
    protected $table = 'pengumuman';
    protected $allowedFields = ['id_pengumuman', 'waktu', 'judul', 'isi', 'uid'];

    public function showTask() // buat tampilin master data tabel pengumuman
    {
        $builder = $this->db->table('pengumuman');
        $builder->select('*');
        $builder->join('user', 'user.uid = pengumuman.uid', 'left');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function showExpVisibility() // buat tampilin user experience
    {
        $look = array('status' => 'Belum Dilihat');
        $builder = $this->db->table('pengumuman_visibility');
        $builder->select('*');
        $builder->join('pengumuman', 'pengumuman.id_pengumuman = pengumuman_visibility.id_pengumuman');
        $builder->join('user', 'user.uid = pengumuman_visibility.uid');
        $builder->where('status', $look);
        $builder->where('pengumuman_visibility.uid', session('uid'));
        $query = $builder->get(5)->getResultArray();
        return $query;
    }

    public function CountExpVisibility($uid) // count jumlah pengumuman
    {
        // $look = array('status' => 'Belum Dilihat');
        $builder = $this->db->table('pengumuman_visibility');
        $builder->where('uid', session('uid'));
        $builder->where('status', 'Belum Dilihat');
        $query = $builder->countAllResults();
        return $query;
    }

    public function UpdateVisibility($data, $id_pengumuman)
    {
        $builder = $this->db->table('pengumuman_visibility');
        $builder->where('id_pengumuman', $id_pengumuman);
        $builder->where('uid', session('uid'));
        $query = $builder->update($data);
        return $query;
    }

    public function UpdateshowExpVisibility() // buat tampilin user experience
    {
        $look = array('status' => 'Belum Dilihat');
        $builder = $this->db->table('pengumuman_visibility');
        $builder->select('*');
        $builder->join('pengumuman', 'pengumuman.id_pengumuman = pengumuman_visibility.id_pengumuman');
        $builder->join('user', 'user.uid = pengumuman_visibility.uid');
        $builder->where('status', $look);
        $builder->where('pengumuman_visibility.uid', session('uid'));
        $query = $builder->get(5)->getResultArray();
        return $query;
    }

    // pengumuman section

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

    public function deleteInfo($id)
    {
        $query = $this->db->table('pengumuman')->delete(array('id_pengumuman' => $id));
        return $query;
    }
}
