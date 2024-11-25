<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Radiologi extends Model
{
    protected $DBGroup          = 'layanan';
    protected $table            = 'hasil_rad';
    protected $primaryKey       = 'ID';
    // protected $allowedField     = ['STATUS', 'DIBUAT_TANGGAL', 'DIBUAT_OLEH'];

    public function getCetakRadiologi($idr)
    {
        $query = $this->db->query("CALL layanan.CetakHasilRad(?)", [$idr]);
        return $query->getResultArray();
    }
}
