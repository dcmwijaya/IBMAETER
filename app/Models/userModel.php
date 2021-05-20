<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'uid';
    protected $allowedFields = ['nama', 'email', 'password', 'role', 'picture'];

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

    public function countUser()
    {
        return $this->db->table('user')->countAllResults();
    }

    public function countFemale()
    {
        return $this->db->table('user')->selectCount('gender')->where('gender', 'Female')->get()->getResultArray();
    }

    public function countMale()
    {
        return $this->db->table('user')->selectCount('gender')->where('gender', 'Male')->get()->getResultArray();
    }
}
