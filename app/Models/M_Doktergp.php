<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Doktergp extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'jasamedisranap';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'NomorSEP', 'StatusRealisasi', 'NilaiRealisasi', 'NilaiRealCost', 'NamaTindakan', 'KelompokTindakan', 'JasaMedisTindakanDokterUmumRvu', 'Poliklinik', 'Dokter', 'Monthout', 'YearOut'];
    public function getFilteredData($asuransi = 'BPJS / JKN', $bulan = 'Apr', $tahun = '2024')
    {
        $builder = $this->builder(); // Use the default builder

        if ($asuransi) {
            $builder->where('NamaAsuransi', $asuransi); // Adjust field name if necessary
        }

        if ($bulan) {
            $builder->where('Monthout', $bulan); // Adjust field name if necessary
        }

        if ($tahun) {
            $builder->where('YearOut', $tahun); // Adjust field name if necessary
        }

        $builder->select('Poliklinik, SUM(JasaMedisTindakanDokterUmumRvu) as totalJasa');
        $builder->groupBy('Poliklinik');
        $builder->where('JasaMedisTindakanDokterUmumRvu > 0');

        return $builder->get()->getResult();
    }

    public function getDokterruangan($asuransi, $bulan, $tahun)
    {
        // Using the model's database connection
        $db = $this->db;

        try {
            // Creating the query using Query Builder
            $builder = $db->table('jasamedisranap')
                ->select("Poliklinik, SUM(JasaMedisTindakanDokterUmumRvu) AS JasaDokterUmum")
                ->where('NamaAsuransi', $asuransi)
                ->where('MonthOut', $bulan)
                ->where('YearOut', $tahun)
                ->where('JasaMedisTindakanDokterUmumRvu > 0')
                ->groupBy('Poliklinik');




            // Executing the query
            $query = $builder->get();

            // Returning the results as an array
            return $query->getResultArray();
        } catch (\Exception $e) {
            // Logging the exception and returning an empty array in case of an error
            log_message('error', 'Error executing getKebersamaan query: ' . $e->getMessage());
            return [];
        }
    }
}
