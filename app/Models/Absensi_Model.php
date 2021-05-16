<?php

namespace App\Models;

use CodeIgniter\Model;

class Absensi_Model extends Model
{
    protected $table = 'absensi';
    protected $allowedFields = ['uid_absen', 'email_absen', 'absen', 'waktu_absen'];

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
        return $this->where(['uid_absen' => $uid, 'waktu_absen' => $date])->first();
    }
}
