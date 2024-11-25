<?php

namespace App\Models;

use CodeIgniter\Model;

class JasaRanapModel extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'js_ranap';
    protected $primaryKey = 'IdRegisterKunjungan';
    protected $allowedFields = ['IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'NamaRuangan', 'NamaTindakan', 'KelompokTindakan', 'JasaRS', 'JasaPelaksana', 'JasaMedis', 'JasaMedisUmum', 'JasaParamedis', 'JasaKebersamaan'];
    public function getJasaRuangan($ruangan, $asuransi, $periode, $tahun)
    {
        try {
            $db = \Config\Database::connect($this->DBGroup);
            $query = $db->query("CALL smartremun2023.GetJasaRuanganRanap(?, ?, ?, ?)", [$ruangan, $asuransi, $periode, $tahun]);
            return $query->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', 'Error executing CetakRincianPasien: ' . $e->getMessage());
            return [];
        }
    }
}
