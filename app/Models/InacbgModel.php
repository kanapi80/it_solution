<?php

namespace App\Models;

use CodeIgniter\Model;

class InacbgModel extends Model
{

    protected $DBGroup          = 'inacbg';
    protected $table            = 'grouping';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['NOPEN', 'DATA'];

    public function getCetakLIP($id, $kd_kelas)
    {
        try {
            $db = \Config\Database::connect($this->DBGroup);
            $query = $db->query("CALL inacbg.CetakLapIndividual5(?, ?)", [$id, $kd_kelas]);
            return $query->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', 'Error executing CetakLIP: ' . $e->getMessage());
            return [];
        }
    }

    public function getHarian()
    {
        try {
            $db = \Config\Database::connect($this->DBGroup);
            $query = $db->query("CALL inacbg.jkn_grouping('HARI')");
            return $query->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', 'Error executing ListGrouping: ' . $e->getMessage());
            return [];
        }
    }
    // public function getHarian()
    // {
    //     try {
    //         $db = \Config\Database::connect($this->DBGroup);
    //         $query = $db->query("CALL inacbg.jkn_grouping('HARI')");

    //         // Pastikan ada hasil sebelum mengambil array
    //         if ($query->getNumRows() > 0) {
    //             return $query->getResultArray();
    //         } else {
    //             return []; // Kembalikan array kosong jika tidak ada data
    //         }
    //     } catch (\Throwable $e) {
    //         log_message('error', 'Error executing getHarian: ' . $e->getMessage());
    //         return [];
    //     }
    // }
}
