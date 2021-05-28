<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'uid';
    protected $allowedFields = ['nama', 'email', 'password', 'role', 'picture', 'divisi_user', 'tanggal_lahir', 'gender', 'nama_divisi'];


    public function getUser($email = false)
    {
        if ($email == false) {
            return $this->findAll();
        }
        return $this->where(['email' => $email])->first();
    }

    public function getJoinDivisionUser($uid = false)
    {
        if ($uid == false) {
            $builder = $this->db->table('user');
            $builder->select('user.uid, user.email, user.divisi_user, user.gender, user.nama, user.picture, user.role, user.tanggal_lahir, id_divisi, nama_divisi, kode_divisi, role_divisi');
            $builder->join('user_divisi', 'user_divisi.id_divisi = user.divisi_user', 'left');
            $query = $builder->get()->getResultArray();
            return $query;
        }
        $builder = $this->db->table('user');
        $builder->select('user.uid, user.email, user.divisi_user, user.gender, user.nama, user.picture, user.role, user.tanggal_lahir, id_divisi, nama_divisi, kode_divisi, role_divisi');
        $builder->join('user_divisi', 'user_divisi.id_divisi = user.divisi_user', 'left');
        $builder->where(['uid' => $uid]);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function viewDivisionUser($id = false)
    {
        if ($id == false) {
            $builder = $this->db->table('user_divisi');
            $builder->select('*');
            $builder->orderBy('id_divisi', 'ASC');
            $query = $builder->get()->getResult();
            return $query;
        }
        $builder = $this->db->table('user_divisi');
        $builder->select('*');
        $builder->orderBy('nama_divisi', 'ASC');
        $query = $builder->where(['id_divisi' => $id]);
        return $query->get()->getResult();
    }

    public function RoleDivisionUser($role)
    {
        $builder = $this->db->table('user_divisi');
        $builder->select('id_divisi, nama_divisi');
        $builder->orderBy('nama_divisi', 'ASC');
        $query = $builder->where(['role_divisi' => $role]);
        return $query->get()->getResult();
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
        return $this->db->table('user')->selectCount('gender')->where('gender', 'Perempuan')->get()->getResultArray();
    }

    public function countMale()
    {
        return $this->db->table('user')->selectCount('gender')->where('gender', 'Laki-Laki')->get()->getResultArray();
    }
}
