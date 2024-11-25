<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Sep extends Model
{
    protected $DBGroup          = 'bpjs';
    protected $table            = 'kunjungan';
    protected $primaryKey       = 'noSEP';
    // protected $allowedField     = ['STATUS', 'DIBUAT_TANGGAL', 'DIBUAT_OLEH'];

    public function getCetakSEP($no_SEP)
    {
        $query = $this->db->query("CALL bpjs.CetakSEP(?)", [$no_SEP]);
        return $query->getResultArray();
    }
    public function getCetakSPRI($no_spri)
    {
        $query = $this->db->query("CALL bpjs.CetakSPRI(?)", [$no_spri]);
        return $query->getResultArray();
    }
}
