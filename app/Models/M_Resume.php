<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Resume extends Model
{
    protected $DBGroup          = 'mr';
    protected $table            = 'resume';
    protected $primaryKey       = 'id';
    // protected $allowedField     = ['STATUS', 'DIBUAT_TANGGAL', 'DIBUAT_OLEH'];

    public function getCetakResume($id)
    {
        // // $nokun = '1021R0010824V014754';
        $query = $this->db->query("CALL medicalrecord.CetakMR1(?)", [$id]);
        // // $query = $this->db->query("CALL medicalrecord.CetakResume(?)", [$id, $nokun]);
        // $db = \Config\Database::connect($this->DBGroup);
        // $query = $this->db->query("CALL medicalrecord.CetakResume(?, ?)", [$id, $nokun]);
        // var_dump($query->getResultArray());
        return $query->getResultArray();
        // try {
        //     $db = \Config\Database::connect($this->DBGroup);
        //     $query = $db->query("CALL medicalrecord.CetakResume(?, ?)", [$id, $nokun]);
        //     return $query->getResultArray();
        //     var_dump($query->getResultArray());
        // } catch (\Throwable $e) {
        //     log_message('error', 'Error executing CetakHasilLab: ' . $e->getMessage());
        //     return [];
        // }
    }
    public function getCetakTriase($nokunValue, $st)
    {
        // $st = 1;
        $query = $this->db->query("CALL medicalrecord.CetakTriage(?, ?)", [$nokunValue, $st]);
        return $query->getResultArray();
    }

    public function getCetakTriaseranap($no_spri, $st)
    {
        // $st = 1;
        $query = $this->db->query("CALL medicalrecord.CetakTriage(?, ?)", [$no_spri, $st]);
        return $query->getResultArray();
    }
}
