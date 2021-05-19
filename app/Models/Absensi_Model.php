<?php

namespace App\Models;

use CodeIgniter\Model;

class Absensi_Model extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id_absen';
    protected $allowedFields = ['uid_absen', 'email_absen', 'status_absen', 'tgl_absen', 'waktu_absen'];

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

    public function countWorked(){
        return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where('status_absen','Attendance')->get()->getResultArray();
    }

    public function countNotWorked(){
        return $this->db->table('absensi')->selectCount('uid_absen')->distinct()->where('status_absen','Late')->get()->getResultArray();
    }
}
