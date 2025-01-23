<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kebersamaan extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'jasamedisigd';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jasaAsisten_kebersamaan', 'PundiRemunRvu', 'NamaAsuransi', 'MonthOut', 'YearOut', 'JasaMedisRvu', 'JasaMedisTindakanRvu', 'fpk'];

    public function getKebersamaan($asuransi, $bulan, $tahun, $fpk)
    {
        // Using the model's database connection
        $db = $this->db;

        try {
            // Creating the query using Query Builder
            $builder = $db->table('jasamedisigd')
                ->select("'IGD' AS Type, SUM(jasaAsisten_kebersamaan) AS Kebersamaan, SUM(PundiRemunRvu) AS JasaRS")
                ->where('NamaAsuransi', $asuransi)
                ->where('MonthOut', $bulan)
                ->where('YearOut', $tahun)
                ->where('fpk', $fpk)
                ->union(
                    $db->table('jasamedisranap')
                        ->select("'RI' AS Type, SUM(jasaAsisten_kebersamaan) AS Kebersamaan, SUM(PundiRemunRvu) AS JasaRS")
                        ->where('NamaAsuransi', $asuransi)
                        ->where('MonthOut', $bulan)
                        ->where('YearOut', $tahun)
                        ->where('fpk', $fpk)
                )
                ->union(
                    $db->table('jasamedisrajal')
                        ->select("'RJ' AS Type, SUM(jasaAsisten_kebersamaan) AS Kebersamaan, SUM(PundiRemunRvu) AS JasaRS")
                        ->where('NamaAsuransi', $asuransi)
                        ->where('MonthOut', $bulan)
                        ->where('YearOut', $tahun)
                        ->where('fpk', $fpk)
                )
                ->union(
                    $db->table('jasamedisoperasi')
                        ->select("'IBS' AS Type, SUM(jasaAsisten_kebersamaan) AS Kebersamaan, SUM(PundiRemunRvu) AS JasaRS")
                        ->where('NamaAsuransi', $asuransi)
                        ->where('MonthOut', $bulan)
                        ->where('YearOut', $tahun)
                        ->where('fpk', $fpk)
                )
                ->union(
                    $db->table('jasamedislab')
                        ->select("'LABROATORIUM' AS Type, SUM(proporsi) AS Kebersamaan, SUM(PundiRemunRvu) AS JasaRS")
                        ->where('NamaAsuransi', $asuransi)
                        ->where('MonthOut', $bulan)
                        ->where('YearOut', $tahun)
                        ->where('fpk', $fpk)
                )
                ->union(
                    $db->table('jasamedisrad')
                        ->select("'RADIOLOGI' AS Type, SUM(proporsi) AS Kebersamaan, SUM(PundiRemunRvu) AS JasaRS")
                        ->where('NamaAsuransi', $asuransi)
                        ->where('MonthOut', $bulan)
                        ->where('YearOut', $tahun)
                        ->where('fpk', $fpk)
                )
                ->union(
                    $db->table('jasamedisfarmasi')
                        ->select("'FARMASI' AS Type, SUM(Give) AS Kebersamaan, SUM(PundiRemunRvu) AS JasaRS")
                        ->where('NamaAsuransi', $asuransi)
                        ->where('MonthOut', $bulan)
                        ->where('YearOut', $tahun)
                        ->where('fpk', $fpk)
                );

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
    public function getAllDokter($bulan, $tahun, $asuransi)
    {
        $query = $this->db->query("CALL getDokterSummary(?,?,?)", [$bulan, $tahun, $asuransi]);
        return $query->getResultArray();
    }
}
