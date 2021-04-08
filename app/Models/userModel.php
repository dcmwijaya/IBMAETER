<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'uid';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['nama', 'email', 'password', 'role', 'profil_pict'];

    public function getUser($email = false)
    {
        if ($email == false) {
            return $this->findAll();
        }
        return $this->where(['email' => $email])->first();
    }

    public function getUserId($uid)
    {
        return $this->where(['uid' => $uid])->first();
    }
}
