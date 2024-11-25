<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kunjungan extends Model
{
    protected $DBGroup          = 'pendaftaran';
    protected $table            = 'kunjungan';
    protected $primaryKey       = 'id';
    // protected $allowedField     = ['STATUS', 'DIBUAT_TANGGAL', 'DIBUAT_OLEH'];

    public function getCetakResumeAdd($nokun)
    {
        $query = $this->db->query("CALL pendaftaran.jkn_resume(?)", [$nokun]);
        return $query->getResultArray();
    }
}
