<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang_Model extends Model
{
    protected $table = 'item';

    public function getItems($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_item' => $id])->first();
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

    public function viewSuppliers()
    {
        $builder = $this->db->table('supplier');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function joinSupplier()
    {
        $builder = $this->db->table('item');
        $builder->select('*');
        $builder->join('supplier', 'supplier.id_supplier = item.id_supplier', 'left');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    // ============================ View Chart =============================//
    public function stockclass1()
    {
        return $this->db->table('item')->selectSum('stok')->where('penyimpanan', 'A')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function stockclass2()
    {
        return $this->db->table('item')->selectSum('stok')->where('penyimpanan', 'B')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function stockclass3()
    {
        return $this->db->table('item')->selectSum('stok')->where('penyimpanan', 'C')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function stockclass4()
    {
        return $this->db->table('item')->selectSum('stok')->where('penyimpanan', 'D')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function stockclass5()
    {
        return $this->db->table('item')->selectSum('stok')->where('penyimpanan', 'E')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function stockclass6()
    {
        return $this->db->table('item')->selectSum('stok')->where('penyimpanan', 'F')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function stockclass7()
    {
        return $this->db->table('item')->selectSum('stok')->where('penyimpanan', 'G')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function stockjenis1()
    {
        return $this->db->table('item')->selectSum('stok')->where('jenis', 'Cair')->distinct()->orderBy('jenis, jenis ASC')->get()->getResultArray();
    }

    public function stockjenis2()
    {
        return $this->db->table('item')->selectSum('stok')->where('jenis', 'Minyak')->distinct()->orderBy('jenis, jenis ASC')->get()->getResultArray();
    }

    public function stockjenis3()
    {
        return $this->db->table('item')->selectSum('stok')->where('jenis', 'Mudah Terbakar')->distinct()->orderBy('jenis, jenis ASC')->get()->getResultArray();
    }

    public function stockjenis4()
    {
        return $this->db->table('item')->selectSum('stok')->where('jenis', 'Padat')->distinct()->orderBy('jenis, jenis ASC')->get()->getResultArray();
    }

    public function stockjenis5()
    {
        return $this->db->table('item')->selectSum('stok')->where('jenis', 'Daging')->distinct()->orderBy('jenis, jenis ASC')->get()->getResultArray();
    }

    public function invenclass()
    {
        return $this->db->table('item')->select('penyimpanan')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function jenis()
    {
        return $this->db->table('item')->select('jenis')->distinct()->orderBy('jenis, jenis ASC')->get()->getResultArray();
    }

    public function costclassA()
    {
        return $this->db->table('item')->selectSum('harga')->where('penyimpanan', 'A')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function costclassB()
    {
        return $this->db->table('item')->selectSum('harga')->where('penyimpanan', 'B')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function costclassC()
    {
        return $this->db->table('item')->selectSum('harga')->where('penyimpanan', 'C')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function costclassD()
    {
        return $this->db->table('item')->selectSum('harga')->where('penyimpanan', 'D')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function costclassE()
    {
        return $this->db->table('item')->selectSum('harga')->where('penyimpanan', 'E')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function costclassF()
    {
        return $this->db->table('item')->selectSum('harga')->where('penyimpanan', 'F')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function costclassG()
    {
        return $this->db->table('item')->selectSum('harga')->where('penyimpanan', 'G')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function weightclassA()
    {
        return $this->db->table('item')->selectSum('berat')->where('penyimpanan', 'A')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function weightclassB()
    {
        return $this->db->table('item')->selectSum('berat')->where('penyimpanan', 'B')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function weightclassC()
    {
        return $this->db->table('item')->selectSum('berat')->where('penyimpanan', 'C')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function weightclassD()
    {
        return $this->db->table('item')->selectSum('berat')->where('penyimpanan', 'D')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function weightclassE()
    {
        return $this->db->table('item')->selectSum('berat')->where('penyimpanan', 'E')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function weightclassF()
    {
        return $this->db->table('item')->selectSum('berat')->where('penyimpanan', 'F')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function weightclassG()
    {
        return $this->db->table('item')->selectSum('berat')->where('penyimpanan', 'G')->distinct()->orderBy('penyimpanan, penyimpanan ASC')->get()->getResultArray();
    }

    public function sumStock()
    {
        return $this->db->table('item')->selectSum('stok')->get()->getResultArray();
    }

    public function sumCost()
    {
        return $this->db->table('item')->selectSum('harga')->get()->getResultArray();
    }

    public function sumWeight()
    {
        return $this->db->table('item')->selectSum('berat')->get()->getResultArray();
    }
}