<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Tagihan extends Model
{
    protected $DBGroup          = 'pembayaran';
    protected $table            = 'tagihan';
    protected $primaryKey       = 'QID';
    public function getCetakBilling($notag, $st)
    {
        try {
            $db = \Config\Database::connect($this->DBGroup);
            $query = $db->query("CALL pembayaran.CetakRincianPasien(?, ?)", [$notag, $st]);
            return $query->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', 'Error executing CetakRincianPasien: ' . $e->getMessage());
            return [];
        }
    }
}
