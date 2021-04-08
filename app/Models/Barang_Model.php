<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang_Model extends Model
{
    protected $table = 'item';

    public function getItems()
    {
        return $this->findAll();
    }

    public function addItem($data)
    {
        $query = $this->db->table('item')->insert($data);
        return $query;
    }

    public function updateItem($data, $id)
    {
        $query = $this->db->table('item')->update($data, array('id_item' => $id));
        return $query;
    }

    public function deleteItem($id)
    {
        $query = $this->db->table('item')->delete(array('id_item' => $id));
        return $query;
    }

    public function IncomeItem($data, $id)
    {
        $query = $this->db->table('detail_in')->insert($data);
        return $query;
    }
    public function OutcomeItem($data, $id)
    {
        $query = $this->db->table('detail_out')->insert($data);
        return $query;
    }

    public function LogItem($data)
    {
        $query = $this->db->table('log')->insert($data);
        return $query;
    }

    // ============================ View Chart =============================//
    public function stock()
    {
        return $this->db->table('item')->select('stok')->distinct()->get()->getResultArray();
    }

    public function invenclass()
    {
        return $this->db->table('item')->select('penyimpanan')->distinct()->get()->getResultArray();
    }

    public function jenis()
    {
        return $this->db->table('item')->select('jenis')->distinct()->get()->getResultArray();
    }
}
