<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangsModel extends Model
{
    protected $DBGroup          = 'sipejuang';
    protected $table            = 'barang';
    protected $primaryKey       = 'id';

    protected $allowedFields    = ['id', 'nama_barang', 'kategori', 'jenis', 'satuan'];

    public function getKategori()
    {
        return $this->select('barang.jenis')
            ->groupBy('barang.jenis')
            ->findAll();
    }
}
