<?php

namespace App\Models;

use CodeIgniter\Model;

class Komplain_Model extends Model
{
    protected $table = 'komplain';
    protected $allowedFields = ['no_komplain', 'uid_komplain', 'email_komplain', 'judul_komplain', 'isi_komplain', 'foto_komplain', 'waktu_komplain'];

    public function getKomplain($no = false)
    {
        if ($no == false) {
            return $this->findAll();
        }
        return $this->where(['no_komplain' => $no])->first();
    }

    public function notifsKomplain()
    {
        $builder = $this->db->table('komplain');
        $query = $builder->countAllResults();
        return $query;
    }
}
