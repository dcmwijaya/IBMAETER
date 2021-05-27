<?php

namespace App\Models;

use CodeIgniter\Model;

class userDivisi_Model extends Model
{
    protected $table = 'user_divisi';
    protected $primaryKey = 'id_divisi';
    protected $allowedFields = ['nama_divisi', 'kode_divisi', 'role_divisi'];

    public function getDivisi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id_divisi' => $id])->first();
        }
    }
}
