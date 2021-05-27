<?php

namespace App\Models;

use CodeIgniter\Model;

class Absensi_Model extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id_absen';
    protected $allowedFields = ['uid_absen', 'email_absen', 'status_absen', 'alasan_izin', 'bukti_izin', 'tgl_absen', 'waktu_absen', 'respons', 'komen_izin', 'waktu_komen'];

    public function getAbsen($uid = false, $date = false)
    {
        if ($uid == false && $date == false) {
            return $this->findAll();
        } elseif ($uid != false && $date == false) {
            return $this->where(['uid_absen' => $uid])->findAll();
        } elseif ($uid == false && $date != false) {
            return $this->where(['waktu_absen' => $date])->findAll();
        } else {
            return $this->where(['uid_absen' => $uid, 'waktu_absen' => $date])->first();
        }
    }

    public function getStatus($uid, $date)
    {
        return $this->where(['uid_absen' => $uid, 'tgl_absen' => $date])->first();
    }

    public function getStatusIzin($uid, $date)
    {
        return $this->where(['uid_absen' => $uid, 'tgl_absen' => $date, 'status_absen' => "Izin"])->first();
    }

    public function countPresent($bawah = null, $atas = null)
    {
        // menghitung jumlah hadir dari tabel absensi
        // query utama : 'status_absen' = "Hadir"
        if ($bawah == null and $atas == null) {
            return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where(['tgl_absen' => date("Y-m-d"), 'status_absen' => "Hadir"])->get()->getResultArray();
        } elseif ($bawah == null) {
            return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where(['status_absen' => "Hadir", 'tgl_absen <=' => $atas])->get()->getResultArray();
        } elseif ($atas == null) {
            return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where(['status_absen' => "Hadir", 'tgl_absen >=' => $bawah])->get()->getResultArray();
        } else {
            return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where(['status_absen' => "Hadir", 'tgl_absen >=' => $bawah, 'tgl_absen <=' => $atas])->get()->getResultArray();
        }
    }

    public function countLate($bawah = null, $atas = null)
    {
        // menghitung jumlah hadir tapi terlambat dari tabel absensi
        // query utama : 'status_absen' = "Terlambat"
        if ($bawah == null and $atas == null) {
            return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where(['tgl_absen' => date("Y-m-d"), 'status_absen' => "Terlambat"])->get()->getResultArray();
        } elseif ($bawah == null) {
            return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where(['status_absen' => "Terlambat", 'tgl_absen <=' => $atas])->get()->getResultArray();
        } elseif ($atas == null) {
            return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where(['status_absen' => "Terlambat", 'tgl_absen >=' => $bawah])->get()->getResultArray();
        } else {
            return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where(['status_absen' => "Terlambat", 'tgl_absen >=' => $bawah, 'tgl_absen <=' => $atas])->get()->getResultArray();
        }
    }

    public function countPermission($bawah = null, $atas = null)
    {
        // menghitung jumlah izin dari tabel absensi
        // query utama : 'status_absen' = "Izin" AND 'respons' = "Diterima"
        if ($bawah == null and $atas == null) {
            return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where(['tgl_absen' => date("Y-m-d"), 'status_absen' => "Izin", 'respons' => "Diterima"])->get()->getResultArray();
        } elseif ($bawah == null) {
            return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where(['status_absen' => "Izin", 'respons' => "Diterima", 'tgl_absen <=' => $atas])->get()->getResultArray();
        } elseif ($atas == null) {
            return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where(['status_absen' => "Izin", 'respons' => "Diterima", 'tgl_absen >=' => $bawah])->get()->getResultArray();
        } else {
            return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where(['status_absen' => "Izin", 'respons' => "Diterima", 'tgl_absen >=' => $bawah, 'tgl_absen <=' => $atas])->get()->getResultArray();
        }
    }
}
