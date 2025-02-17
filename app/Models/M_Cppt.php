<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Cppt extends Model
{
    protected $DBGroup          = 'mr';
    protected $table            = 'cppt';
    protected $primaryKey       = 'id';
    // protected $allowedField     = ['STATUS', 'DIBUAT_TANGGAL', 'DIBUAT_OLEH'];

    public function getCetakCPPT($cppt1, $cppt2)
    {
        try {
            $db = \Config\Database::connect($this->DBGroup);
            $query = $db->query("CALL medicalrecord.CetakCPPT(?, ?)", [$cppt1, $cppt2]);
            return $query->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', 'Error executing CetakCPPT: ' . $e->getMessage());
            return [];
        }
    }
    public function getCetakCatatanMedik($cppt1, $cppt2)
    {
        try {
            $db = \Config\Database::connect($this->DBGroup);
            $query = $db->query("CALL medicalrecord.CatatanMedik(?, ?)", [$cppt1, $cppt2]);
            return $query->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', 'Error executing CetakCPPT: ' . $e->getMessage());
            return [];
        }
    }
    public function getCetakCPPTdetail($nopen, $nokun)
    {
        try {
            $db = \Config\Database::connect($this->DBGroup);
            $query = $db->query("CALL medicalrecord.CetakCPPT(?, ?)", [$nopen, $nokun]);
            return $query->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', 'Error executing CetakCPPT: ' . $e->getMessage());
            return [];
        }
    }
}
