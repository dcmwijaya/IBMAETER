<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipKomp_Model extends Model
{
    protected $table = 'arsip_komplain';
    // protected $primaryKey = 'no_arsipKomp';
    protected $allowedFields = ['no_arsipKomp', 'uid_arsipKomp', 'email_arsipKomp', 'judul_arsipKomp', 'isi_arsipKomp', 'foto_arsipKomp', 'waktu_arsipKomp', 'status_arsipKomp', 'comment_arsipKomp'];

    public function getAll()
    {
        return $this->findAll();
    }

    public function getHold($uid)
    {
        return $this->where(['status_arsipKomp' => 'hold'])->findAll();
    }

    public function getAccept()
    {
        return $this->where(['status_arsipKomp' => 'accepted'])->findAll();
    }

    public function getRejected()
    {
        return $this->where(['status_arsipKomp' => 'declined'])->findAll();
    }
}
