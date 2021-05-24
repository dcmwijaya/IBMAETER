<?php

namespace App\Models;

use CodeIgniter\Model;

class Komplain_Model extends Model
{
    protected $table = 'komplain';
    protected $primaryKey = 'id_komplain';
    protected $allowedFields = ['id_komplain', 'no_komplain', 'uid_komplain', 'judul_komplain', 'isi_komplain', 'foto_komplain', 'waktu_komplain'];

    public function getKomplain($id = false)
    {
        if ($id == false) {
            $builder = $this->db->table('komplain');
            $builder->select('id_komplain, no_komplain, user.nama, judul_komplain, isi_komplain, foto_komplain, waktu_komplain');
            $builder->join('user', 'user.uid = komplain.uid_komplain', 'left');
            $query = $builder->get()->getResultArray();
            return $query;
        } else {
            $builder = $this->db->table('komplain');
            $builder->select('id_komplain, no_komplain, user.nama, judul_komplain, isi_komplain, foto_komplain, waktu_komplain');
            $builder->join('user', 'user.uid = komplain.uid_komplain');
            // $query = $builder->getWhere(['id_komplain' => $id]);
            $builder->where(['id_komplain' => $id]);
            $query = $builder->get()->getResultArray();
            return $query;
        }
    }

    public function notifsKomplain()
    {
        $builder = $this->db->table('komplain');
        $query = $builder->countAllResults();
        return $query;
    }
}
