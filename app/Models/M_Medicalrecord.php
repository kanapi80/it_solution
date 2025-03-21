<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Medicalrecord extends Model
{
    protected $DBGroup          = 'mr';
    protected $table            = 'pemeriksaan_procedur_kfr';
    protected $primaryKey       = 'id';
    // protected $allowedField     = ['STATUS', 'DIBUAT_TANGGAL', 'DIBUAT_OLEH'];

    public function getrehabmedik($nokun)
    {
        try {
            $db = \Config\Database::connect($this->DBGroup);
            $query = $db->query("CALL medicalrecord.jkn_rehabmedik(?)", $nokun);
            return $query->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', 'Error executing CetakCPPT: ' . $e->getMessage());
            return [];
        }
    }
}
