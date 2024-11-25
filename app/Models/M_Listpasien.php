<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Listpasien extends Model
{
    protected $DBGroup          = 'pendaftaran';
    protected $table            = 'pendaftaran';
    protected $primaryKey       = 'nosep';
    // protected $allowedField     = ['STATUS', 'DIBUAT_TANGGAL', 'DIBUAT_OLEH'];

    public function getlistPasien($nosep)
    {
        $query = $this->db->query("CALL pendaftaran.jkn_ranap(?)", [$nosep]);
        return $query->getResultArray();
    }
    public function getlistPasienRanap($nosep)
    {
        $query = $this->db->query("CALL pendaftaran.jkn_pasien(?)", [$nosep]);
        return $query->getResultArray();
    }
}
