<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $DBGroup = 'master';
    protected $table = 'ruangan';
    protected $primaryKey = 'ID';
    protected $returnType = 'array';
    protected $allowedFields = ['ID', 'JENIS', 'JENIS_KUNJUNGAN', 'DESKRIPSI', 'STATUS'];


    public function getRuanganAlls()
    {
        return $this->select('ID, DESKRIPSI')
            ->whereIn('JENIS_KUNJUNGAN', [1, 2, 3, 4, 5, 6])
            ->where('STATUS', 1)
            ->where('JENIS', 5)
            ->orderBy('JENIS', 'ASC')
            ->orderBy('JENIS_KUNJUNGAN', 'ASC')
            ->get()
            ->getResultArray(); // Tambahkan ini agar data dikembalikan dalam bentuk array
    }
}
