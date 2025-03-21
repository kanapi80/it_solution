<?php

namespace App\Models;

use CodeIgniter\Model;

class RekonRajalModel extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'jasamedisrajal';
    protected $primaryKey = 'IdRegisterKunjungan';
    protected $allowedFields = ['IdRegisterKunjungan', 'NomorRekamMedis', 'NamaPasien', 'NamaAsuransi', 'poliklinik', 'Tarif', 'NamaTindakan', 'KelompokTindakan', 'Dokter', 'JasaMedisRvu', 'JasaMedisTindakanRvu', 'JasaAsistenRvu', 'JasaAdmRvu', 'jasaAsisten_kebersamaan', 'fpk'];
    function cariJasaMedisRajal($idx)
    {
        $this->dt = $this->db->table('jasamedisrajal');
        $this->dt->select('jasamedisrajal.*, jasamedisrajal.JasaPelayanan jasaPelayanan');
        $this->dt->where('jasamedisrajal.IdRegisterKunjungan', $idx);
        $this->dt->orderBy('jasamedisrajal.KelompokTindakan');

        $query = $this->dt->get();
        return $query->getResultArray();
    }

    function cariJasaMedisFarmasi($idx)
    {
        $this->dt = $this->db->table('jasamedisfarmasi');
        $this->dt->where('IdRegisterKunjungan', $idx);

        $query = $this->dt->get();
        return $query->getResultArray();
    }
    function cariJasaMedisLab($idx)
    {
        $this->dt = $this->db->table('jasamedislab');
        $this->dt->select('jasamedislab.*, jasamedislab.JasaPelayanan jasaPelayanan');
        $this->dt->where('jasamedislab.IdRegisterKunjungan', $idx);

        $query = $this->dt->get();
        return $query->getResultArray();
    }
    function cariJasaMedisRad($idx)
    {
        $this->dt = $this->db->table('jasamedisrad');
        $this->dt->select('jasamedisrad.*, jasamedisrad.JasaPelayanan jasaPelayanan');
        $this->dt->where('jasamedisrad.IdRegisterKunjungan', $idx);

        $query = $this->dt->get();
        return $query->getResultArray();
    }
    function cariJasaMedisOperasi($idx)
    {
        $this->dt = $this->db->table('jasamedisoperasi');
        $this->dt->select('jasamedisoperasi.*, jasamedisoperasi.JasaPelayanan jasaPelayanan');

        $this->dt->where('jasamedisoperasi.IdRegisterKunjungan', $idx);

        $query = $this->dt->get();
        return $query->getResultArray();
    }

    function sumTransaksi($filter, $idx)
    {
        if (isset($filter)) {
            if ($filter == 'RJ') {
                $this->dt = $this->db->table('transaksirajal');
            } else if ($filter == 'RI') {
                $this->dt = $this->db->table('transaksiranap');
            } else if ($filter == 'IGD') {
                $this->dt = $this->db->table('transaksiigd');
            }

            $this->dt->where('IdRegisterKunjungan', $idx);
            $this->dt->whereIn('StatusRealisasi', [1, 2]);
            $query = $this->dt->get();
            $data = $query->getResultArray();
            $result = [];
            if (count($data) > 0) {
                foreach ($data as $item) {
                    $result[] = $item['TotalTarif'] * $item['Kuantitas'];
                }
                return array_sum($result);
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    function cariJasaMedisRanap($idx)
    {
        $this->dt = $this->db->table('jasamedisranap');
        $this->dt->select('jasamedisranap.*, jasamedisranap.JasaPelayanan jasaPelayanan');
        $this->dt->where('jasamedisranap.IdRegisterKunjungan', $idx);
        $this->dt->orderBy('jasamedisranap.KelompokTindakan');
        $query = $this->dt->get();
        return $query->getResultArray();
    }
    function cariJasaMedisIGD($idx)
    {
        $this->dt = $this->db->table('jasamedisigd');
        $this->dt->select('jasamedisigd.*, jasamedisigd.JasaPelayanan jasaPelayanan');
        $this->dt->where('jasamedisigd.IdRegisterKunjungan', $idx);
        $this->dt->orderBy('jasamedisigd.KelompokTindakan');
        $query = $this->dt->get();
        return $query->getResultArray();
    }
}
