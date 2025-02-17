<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Ruangan extends Model
{
    protected $DBGroup = 'sipayu';

    protected $table            = 'js_ruang';
    protected $primaryKey       = 'id';
    protected $allowedFields     = ['DESKRIPSI', 'KETERANGAN'];

    public function getRuangan()
    {
        return $this->where('KETERANGAN', 'RAWAT INAP')
            ->findAll();
    }

    public function getRawatJalan()
    {
        return $this->where('KETERANGAN', 'RAWAT JALAN')
            ->findAll();
    }
    public function getAllRuangan()
    {
        return $this->whereIn('KETERANGAN', ['IGD', 'IGD VK'])
            ->findAll();
    }
    public function getKamarOperasi()
    {
        return $this->where('KETERANGAN', 'Kamar Operasi')
            ->findAll();
    }
    public function getRadiologi()
    {
        return $this->where('KETERANGAN', 'Radiologi Central')
            ->findAll();
    }
    public function getLaboratorium()
    {
        return $this->whereIn('KETERANGAN', ['Laboratorium Central', 'BDRS', 'Laboratorium PA'])
            ->findAll();
    }
    public function getAllruangans()
    {
        return $this->where('JENIS', 5)
            ->where('STATUS', 1)
            ->whereIn('JENIS_KUNJUNGAN', ['1', '2', '3', '4', '5', '6'])
            ->findAll();
    }
}
