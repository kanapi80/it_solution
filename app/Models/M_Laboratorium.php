<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Laboratorium extends Model
{
    protected $DBGroup          = 'layanan';
    protected $table            = 'hasil_lab';
    protected $primaryKey       = 'ID';
    // protected $allowedField     = ['STATUS', 'DIBUAT_TANGGAL', 'DIBUAT_OLEH'];
    public function getCetakLaboratorium($lab1, $lab2)
    {
        try {
            $db = \Config\Database::connect($this->DBGroup);
            $query = $db->query("CALL layanan.cetakHasilLab(?, ?)", [$lab1, $lab2]);
            return $query->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', 'Error executing CetakHasilLab: ' . $e->getMessage());
            return [];
        }
    }
    public function getHasilLaboratorium($nokun)
    {
        $query = $this->db->query("CALL pendaftaran.jkn_lab(?)", [$nokun]);
        return $query->getResultArray();
    }

    public function getHasilLaboratoriumRajal($no_spri)
    {
        $query = $this->db->query("CALL pendaftaran.jkn_lab(?)", [$no_spri]);
        return $query->getResultArray();
    }
}
