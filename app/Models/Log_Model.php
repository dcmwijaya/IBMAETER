<?php

namespace App\Models;

use CodeIgniter\Model;

class Log_Model extends Model
{
    protected $table = 'alur_barang';
    // protected $primaryKey = 'no_log';
    protected $allowedFields = ['no_log', 'uid', 'tgl', 'status', 'ket'];

    public function ReadLogItem($no = false)
    {
        if ($no == false) {
            return $this->findAll();
        }
        return $this->where(['no_komplain' => $no])->first();
    }

    public function Add_Log_Item($data)
    {
        $query = $this->db->table('alur_barang')->insert($data);
        return $query;
    }
}
