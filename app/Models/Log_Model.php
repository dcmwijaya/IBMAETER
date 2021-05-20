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

    public function updateLogItem($data, $no_log)
    {
        $query = $this->db->table('alur_barang')->update($data, array('no_log' => $no_log));
        return $query;
    }

    public function notifsLog()
    {
        $builder = $this->db->table('alur_barang');
        $builder->where(['status' => 'Pending']);
        $query = $builder->countAllResults();
        return $query;
    }

    public function stockIncome()
    {
        return $this->db->table('alur_barang')->select('ubah_stok')->where('request', 'Masuk')->where('status', 'Diterima')->get()->getResultArray();
    }

    public function stockOutcome()
    {
        return $this->db->table('alur_barang')->select('ubah_stok')->where('request', 'Keluar')->where('status', 'Diterima')->get()->getResultArray();
    }

    public function countIncome()
    {
        $query = $this->db->table('alur_barang')->selectCount('ubah_stok')->where('request', 'Masuk')->where('status', 'Diterima');
        return $query->get()->getResultArray();
    }

    public function countOutcome()
    {
        return $this->db->table('alur_barang')->selectCount('ubah_stok')->where('request', 'Keluar')->where('status', 'Diterima')->get()->getResultArray();
    }
}