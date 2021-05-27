<?php

namespace App\Models;

use CodeIgniter\Model;

class Log_Model extends Model
{
    protected $table = 'alur_barang';
    protected $primaryKey = 'no_log';
    protected $allowedFields = ['id_item', 'uid', 'tgl', 'request', 'status', 'ubah_stok', 'ket', 'uid_alur_admin'];

    public function getIdPerizinan($no_log = false)
    {
        if ($no_log == false) {
            return $this->findAll();
        }
        $builder = $this->db->table('alur_barang');
        $builder->select('berat, harga, item.id_item, id_supplier, jenis, ket, kode_barang, nama, nama_item, no_log, penyimpanan, request, role, status, stok, tgl, ubah_stok, user.uid, uid_alur_admin');
        $builder->join('user', 'user.uid = alur_barang.uid', 'left');
        $builder->join('item', 'item.id_item = alur_barang.id_item', 'left');
        $builder->where(['no_log' => $no_log]);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function ReadLogItem($mulai = null, $akhir = null)
    {
        if ($mulai != null and $akhir != null) {
            $where = ['tgl >=' => $mulai, 'tgl <=' => $akhir];
        } elseif ($mulai != null) {
            $where = ['tgl <=' => $akhir];
        } elseif ($akhir != null) {
            $where = ['tgl >=' => $mulai];
        } else {
            $where = null;
        }

        $builder = $this->db->table('alur_barang');
        $builder->select('*');
        $builder->join('user', 'user.uid = alur_barang.uid', 'left');
        $builder->join('item', 'item.id_item = alur_barang.id_item', 'left');
        if ($where != null) {
            $builder->where($where);
        }
        $query = $builder->get()->getResultArray();
        return $query;
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
        return $this->db->table('alur_barang')->select('*')->where('request', 'Masuk')->where('status', 'Diterima')->get()->getResultArray();
    }

    public function stockOutcome()
    {
        return $this->db->table('alur_barang')->select('*')->where('request', 'Keluar')->where('status', 'Diterima')->get()->getResultArray();
    }

    public function countIncome()
    {
        return  $this->db->table('alur_barang')->selectCount('ubah_stok')->where('request', 'Masuk')->where('status', 'Diterima')->get()->getResultArray();
    }

    public function countOutcome()
    {
        return $this->db->table('alur_barang')->selectCount('ubah_stok')->where('request', 'Keluar')->where('status', 'Diterima')->get()->getResultArray();
    }

    public function sumIncome($bawah = null, $atas = null)
    {
        if ($bawah == null and $atas == null) {
            return $this->db->table('alur_barang')->selectSum('ubah_stok')->where('request', 'Masuk')->where('status', 'Diterima')->get()->getResultArray();
        } elseif ($bawah == null) {
            return $this->db->table('alur_barang')->selectSum('ubah_stok')->where('request', 'Masuk')->where('status', 'Diterima')->where('tgl <=', $atas)->get()->getResultArray();
        } elseif ($atas == null) {
            return $this->db->table('alur_barang')->selectSum('ubah_stok')->where('request', 'Masuk')->where('status', 'Diterima')->where('tgl >=', $bawah)->get()->getResultArray();
        } else {
            return $this->db->table('alur_barang')->selectSum('ubah_stok')->where('request', 'Masuk')->where('status', 'Diterima')->where('tgl >=', $bawah)->where('tgl <=', $atas)->get()->getResultArray();
        }
    }

    public function sumOutcome($bawah = null, $atas = null)
    {
        if ($bawah == null and $atas == null) {
            return $this->db->table('alur_barang')->selectSum('ubah_stok')->where('request', 'Keluar')->where('status', 'Diterima')->get()->getResultArray();
        } elseif ($bawah == null) {
            return $this->db->table('alur_barang')->selectSum('ubah_stok')->where('request', 'Keluar')->where('status', 'Diterima')->where('tgl <=', $atas)->get()->getResultArray();
        } elseif ($atas == null) {
            return $this->db->table('alur_barang')->selectSum('ubah_stok')->where('request', 'Keluar')->where('status', 'Diterima')->where('tgl >=', $bawah)->get()->getResultArray();
        } else {
            return $this->db->table('alur_barang')->selectSum('ubah_stok')->where('request', 'Keluar')->where('status', 'Diterima')->where('tgl >=', $bawah)->where('tgl <=', $atas)->get()->getResultArray();
        }
    }

    public function NotaItem($id)
    {
        $builder = $this->db->table('alur_barang');
        $builder->select('*');
        $builder->join('user', 'user.uid = alur_barang.uid', 'left');
        $builder->join('item', 'item.id_item = alur_barang.id_item', 'left');
        return $builder->where('alur_barang.no_log', $id)->get()->getResultArray();
    }
}
